<?php

namespace App\Http\Livewire\Show;

use App\Http\Globals;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

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
        if ($this->search != null && $this->lang == null) {
            return Table::where('name', 'LIKE', "%$this->search%")
                ->orderByDesc('name')
                ->simplePaginate(20);
        } elseif ($this->search == null && $this->lang != null) {
            return Table::where('lang', 'LIKE', "%$this->lang%")
                ->orderByDesc('name')
                ->simplePaginate(20);
        } elseif ($this->search != null && $this->lang != null) {
            return Table::where('name', 'LIKE', "%$this->search%")
                ->where('lang', 'LIKE', "%$this->lang%")
                ->orderByDesc('name')
                ->simplePaginate(20);
        }
        return Table::orderByDesc('name')
            ->simplePaginate(20);
    }

    function countItems($type)
    {
        return DB::table($type)->get()->count();
    }

    public function render()
    {
        return view('livewire.show.types')->with(['types' => $this->types(), 'languages' => Globals::languages()]);
    }
}
