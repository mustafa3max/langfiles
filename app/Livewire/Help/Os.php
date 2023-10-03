<?php

namespace App\Livewire\Help;

use Livewire\Component;

class Os extends Component
{
    function okOrClose($isOk)
    {
        if ($isOk) {
            return redirect('https://play.google.com/store/apps/details?id=com.langfiles.langfiles');
        }
    }

    public function render()
    {
        return view('livewire.help.os');
    }
}
