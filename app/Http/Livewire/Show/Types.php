<?php

namespace App\Http\Livewire\Show;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Types extends Component
{
    use WithPagination;

    public $languages = ['ar', 'en'];

    function types()
    {
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current', $tables);
        return $tables;
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
