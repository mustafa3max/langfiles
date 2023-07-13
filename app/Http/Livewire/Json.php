<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Json extends Component
{
    function files()
    {
        $file = Storage::disk('types')->allFiles();
        $json = [];
        foreach ($file as $key => $value) {
            $json[] = Storage::disk('types')->get($value);
        }

        return $json;
    }

    public function render()
    {
        return view('livewire.json')->with(['files' => $this->files()]);
    }
}
