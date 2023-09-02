<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AddText extends Component
{
    public $langSelect;
    public $currentLang;


    function langSelect($lang)
    {
        $this->langSelect = $lang;
    }

    function publish($items)
    {
        if (count($items) > 0) {
            $newItems = [];
            foreach ($items as $key => $value) {
                $key = str_replace(' ', '_', $key);
                $key = str_replace('-', '_', $key);
                $key = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));

                if (!preg_match('/[^A-Za-z0-9-_]/', $key)) {
                    $newItems[$key] = $value;
                }
            }

            dd(json_encode($newItems));
        }
    }

    public function mount()
    {
        $this->currentLang = LaravelLocalization::getCurrentLocale();
        $this->langSelect = $this->currentLang;
    }

    public function render()
    {
        return view('livewire.user.add-text');
    }
}
