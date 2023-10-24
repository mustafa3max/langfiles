<?php

namespace App\Livewire\Show;

use App\Http\Globals;
use App\Models\Table;
use Cache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Livewire\Attributes\Rule;
use Mail;

class Types extends Component
{
    use WithPagination;

    #[Rule('string|nullable')]
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
        $attr = $this->validate();

        $this->search = $attr['search'];

        $lang = LaravelLocalization::getCurrentLocale();
        $tables = Table::where(
            function ($query) {
                return $query->where('name_ar', 'LIKE', "%{$this->search}%")
                    ->orWhere('name_en', 'LIKE', "%{$this->search}%");
            }
        )
            ->where('lang', $lang)
            ->orderByDesc('updated_at')
            ->paginate(20);

        if (empty($tables->all())) {
            $allTables = Table::pluck('table');
            $newTables = [];
            foreach ($allTables as $table) {
                $dataTable = DB::table($table)
                    ->where('enabled', true)
                    ->where('language', $lang)
                    ->where(
                        function ($query) {
                            return $query->where('key', 'LIKE', "%{$this->search}%")
                                ->orWhere('value', 'LIKE', "%{$this->search}%");
                        }
                    )
                    ->pluck('type');
                if (!empty($dataTable->all())) {
                    $newTables[] = $table;
                }
            }

            $tables = Table::orderByDesc('updated_at')
                ->whereIn('table', $newTables)
                ->paginate(20);
        }

        return $tables;
    }

    function countItems($table)
    {
        return DB::table($table)->get()->count();
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
