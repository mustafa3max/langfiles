<?php

namespace App\Livewire\Contributors;

use App\Models\Contributor;
use Livewire\Component;

class Index extends Component
{

    function contributors()
    {
        return Contributor::where('enabled', true)->get();
    }

    public function render()
    {
        return view('livewire.contributors.index')->with(['contributors' => $this->contributors()]);
    }
}
