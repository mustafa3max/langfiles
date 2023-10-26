<?php

namespace App\Livewire\Side;

use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NewTypes extends Component
{
    public $type;
    public $currentLang;

    function newTypes()
    {
        $table = str_replace('-', '_', request()->segment(count(request()->segments())));
        $table = str_replace('type_',  $this->currentLang . '_', $table);

        return Table::where('lang', $this->currentLang)
            ->where('table', '!=', $table)
            ->orderByDesc('updated_at')
            ->limit(5)
            ->get(['name_' . $this->currentLang, 'table', 'number']);
    }

    function mount()
    {
        $this->currentLang = LaravelLocalization::getCurrentLocale();

        try {
            $this->type = explode('file/', Request::path())[1];
            $this->type = str_replace('type_', $this->currentLang . '_', $this->type);
        } catch (\Throwable $_) {
        }
    }

    public function render()
    {
        return view('livewire.side.new-types')->with([
            'newTypes' => $this->newTypes(),
            'currentLng' => $this->currentLang,
        ]);
    }
}
