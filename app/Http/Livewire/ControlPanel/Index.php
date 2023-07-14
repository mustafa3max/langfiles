<?php

namespace App\Http\Livewire\ControlPanel;

use App\Http\Globals;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    function types()
    {
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current', $tables);
        return $tables;
    }

    public function mount()
    {
        if (!Auth::user()->owner) {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire..control-panel.index')->with(['types' => $this->types(), 'languages' => Globals::languages()]);
    }
}
