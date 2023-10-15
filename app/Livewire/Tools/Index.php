<?php

namespace App\Livewire\Tools;

use Livewire\Component;
use Storage;

class Index extends Component
{

    public function download()
    {
        return Storage::disk('tools')->download('langfiles_tools.zip');
    }

    public function render()
    {
        return view('livewire.tools.index');
    }
}
