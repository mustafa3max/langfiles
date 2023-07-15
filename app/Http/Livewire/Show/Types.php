<?php

namespace App\Http\Livewire\Show;

use App\Http\Globals;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Types extends Component
{
    use WithPagination;

    public $search;
    public $lang;

    function clearSersh()
    {
        if (strlen($this->search) >= 2) {
            $this->reset('search');
        }
    }

    function isLang($lang)
    {
        $this->lang = $lang;
    }

    function types()
    {
        $lang = LaravelLocalization::getCurrentLocale();
        if ($this->search != null && $this->lang == null) {
            return Table::where('name_' . $lang, 'LIKE', "%$this->search%")
                ->orderByDesc('name_' . $lang)
                ->simplePaginate(20);
        } elseif ($this->search == null && $this->lang != null) {
            return Table::where('lang', 'LIKE', "%$this->lang%")
                ->orderByDesc('name_' . $lang)
                ->simplePaginate(20);
        } elseif ($this->search != null && $this->lang != null) {
            return Table::where('name_' . $lang, 'LIKE', "%$this->search%")
                ->where('lang', 'LIKE', "%$this->lang%")
                ->orderByDesc('name_' . $lang)
                ->simplePaginate(20);
        }
        return Table::orderByDesc('name_' . $lang)
            ->simplePaginate(20);
    }

    function countItems($type)
    {
        return DB::table($type)->get()->count();
    }

    public function render()
    {
        return view('livewire.show.types')->with(['types' => $this->types(), 'languages' => Globals::languages(), 'currentLng' => LaravelLocalization::getCurrentLocale()]);
    }
}
