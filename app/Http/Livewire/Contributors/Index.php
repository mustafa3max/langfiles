<?php

namespace App\Http\Livewire\Contributors;

use App\Models\Contributor;
use Livewire\Component;

class Index extends Component
{

    function contributors()
    {

        $contributor = Contributor::where('enabled', true)
            ->get();

        return $contributor;
    }

    public function render()
    {
        return view('livewire.contributors.index')->with(['contributors' => $this->contributors()]);
    }
}
