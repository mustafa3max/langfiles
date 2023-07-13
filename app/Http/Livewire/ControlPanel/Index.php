<?php

namespace App\Http\Livewire\ControlPanel;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $languages = ['ar', 'en'];

    function types()
    {
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current', $tables);
        return $tables;
    }

    public function render()
    {
        return view('livewire..control-panel.index')->with(['types' => $this->types(), 'languages' => $this->languages]);
    }
}
