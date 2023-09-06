<?php

namespace App\Livewire\Side;

use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NewTypes extends Component
{
    public $type;
    public $currentLang;

    function newTypes()
    {
        return Table::where('lang', $this->currentLang)
            ->where('table', '!=', $this->type)
            ->orderByDesc('updated_at')
            ->limit(5)
            ->get(['name_' . $this->currentLang, 'table']);
    }

    function countItems($table)
    {
        return DB::table($table)
            ->get()->count();
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
