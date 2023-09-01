<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AddText extends Component
{
    public $langSelect;
    public $currentLang;
    public $items1;

    protected $listeners = ['publish'];

    protected $rules = [
        'items1' => 'required',
    ];

    function langSelect($lang)
    {
        $this->langSelect = $lang;
    }

    function publish($items)
    {
        $this->items1 = $items;
        // dd($this->items1);

        $attr = $this->validate();
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
