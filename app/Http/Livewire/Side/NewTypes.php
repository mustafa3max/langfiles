<?php

namespace App\Http\Livewire\Side;

use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NewTypes extends Component
{
    function newTypes()
    {
        $lang = LaravelLocalization::getCurrentLocale();
        return Table::where('lang', $lang)
            ->orderByDesc('updated_at')
            ->limit(5)
            ->get(['name_' . $lang, 'table']);
    }

    function countItems($table)
    {
        return DB::table($table)
            ->get()->count();
    }

    public function render()
    {
        return view('livewire.side.new-types')->with([
            'newTypes' => $this->newTypes(),
            'currentLng' => LaravelLocalization::getCurrentLocale(),
        ]);
    }
}
