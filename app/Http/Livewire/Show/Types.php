<?php

namespace App\Http\Livewire\Show;

use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Types extends Component
{
    use WithPagination;

    public $languages = ['ar', 'en'];
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
        if (in_array($lang, $this->languages)) {
            $this->lang = $lang . '_';
        } else {
            $this->lang = $lang;
        }
    }

    function types()
    {
        $name = null;
        if (strlen($this->search) >= 2) {
            $name = $this->search;
        } elseif (strlen($this->lang) >= 2) {
            $name = $this->lang;
        }
        return Table::where('name', 'LIKE', "%$name%")->simplePaginate(20);
    }

    function countItems($type)
    {
        return DB::table($type)->get()->count();
    }

    public function render()
    {
        return view('livewire.show.types')->with(['types' => $this->types(), 'languages' => $this->languages]);
    }
}
