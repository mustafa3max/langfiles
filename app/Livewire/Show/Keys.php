<?php

namespace App\Livewire\Show;

use App\Http\Globals;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Livewire\Attributes\Rule;

class Keys extends Component
{
    #[Rule('string|nullable')]
    public $search;

    public $offset = 0;

    function clearSersh()
    {
        $this->reset('search');
        session()->remove('offset');
    }

    function previousPage()
    {
        $offset = session()->get('offset') ?? 0;
        $offset -= 5;
        session()->put('offset', $offset);
        $this->keys();
    }

    function nextPage()
    {
        $offset = session()->get('offset') ?? 0;
        $offset += 5;
        session()->put('offset', $offset);
        $this->keys();
    }

    function keys($isSearch = false)
    {

        $attr = $this->validate();

        $this->search = $attr['search'];

        if ($isSearch) {
            session()->remove('offset');
        }

        $lang = LaravelLocalization::getCurrentLocale();
        $tables = Table::where('lang', $lang)->get();

        $keys = [];

        foreach ($tables as $table) {
            $data = DB::table($table->table)
                ->where(
                    function ($query) {
                        return $query->where('key', 'LIKE', "%{$this->search}%")
                            ->orWhere('value', 'LIKE', "%{$this->search}%")
                            ->orWhere('type', 'LIKE', "%{$this->search}%");
                    }
                )
                ->where('enabled', true)
                ->where('language', $lang)
                ->limit(5)
                ->offset(session()->get('offset') ?? 0)
                ->get(['key', 'value', 'language', 'type']);
            $keys = array_merge($data->toArray(), $keys);
        }

        $this->offset = session()->get('offset') ?? 0;

        return $keys;
    }

    function data()
    {
        $tables = Table::get();

        $data = [];

        foreach ($tables as $table) {
            $data[] = DB::table($table->table)
                ->where('enabled', true)
                ->get(['key', 'value', 'language'])->toArray();
        }
        return $data;
    }

    function countKyes()
    {
        $lang = LaravelLocalization::getCurrentLocale();
        $tables = Table::where('lang', $lang)->get();

        $keys = [];

        foreach ($tables as $table) {
            $data = DB::table($table->table)
                ->where('enabled', true)
                ->get(['key', 'value', 'language']);

            $keys = array_merge($data->toArray(), $keys);
        }
        return count($keys);
    }

    function mount()
    {
        session()->remove('offset');
        session()->put('route', Route::currentRouteName());
    }
    public function render()
    {
        return view('livewire.show.keys')->with([
            'keys' => $this->keys(),
            'data' => $this->data(),
            'countKyes' => $this->countKyes(),
            'offset' => $this->offset,
            'share' => Globals::share(__('seo.title_keys')),
            'route' => session()->get('route')
        ]);
    }
}
