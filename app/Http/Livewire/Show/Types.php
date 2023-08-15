<?php

namespace App\Http\Livewire\Show;

use App\Http\Globals;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Types extends Component
{
    use WithPagination;

    public $search;
    public $lang;
    public $isAd = true;

    function clearSersh()
    {
        $this->reset('search');
    }

    function isLang($lang)
    {
        $this->lang = $lang;
    }

    function moreLang($type)
    {
        $langs = [];
        foreach (Globals::languages() as $lang) {
            $type = str_replace($lang . '_', '', $type);
        }
        foreach (Globals::languages() as $lang) {
            $langs[] = $lang . '_' . $type;
        }
        $lang = LaravelLocalization::getCurrentLocale();
        return Table::whereIn('table', $langs)
            ->get()->count();
    }

    function types()
    {
        $lang = LaravelLocalization::getCurrentLocale();
        return Table::where('name_' . $lang, 'LIKE', "%$this->search%")
            ->where('lang', $lang)
            ->orderByDesc('name_' . $lang)
            ->paginate(20);
    }

    function countItems($table)
    {
        return DB::table($table)
            ->get()->count();
    }

    function mount()
    {
        session()->put('route', Route::currentRouteName());
    }

    public function render()
    {
        session()->put('urlTypes', $this->types()->currentPage());
        return view('livewire.show.types')->with([
            'types' => $this->types(),
            'languages' => Globals::languages(),
            'currentLng' => LaravelLocalization::getCurrentLocale(),
            'share' => Globals::share(__('seo.title_types')),
            'route' => session()->get('route')
        ]);
    }
}
