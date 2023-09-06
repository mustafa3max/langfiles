<?php

namespace App\Livewire\ControlPanel;

use App\Http\Globals;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class Create extends Component
{
    public $key;
    public $value;
    public $type;


    protected function rules()
    {
        return [
            'key' => 'required|min:1|max:255|unique:' .  $this->type,
            'value' => 'required|min:1|max:255|unique:' .  $this->type
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    function create()
    {
        $valid = $this->validate();

        $lang = $this->type[0] . $this->type[1];

        if (Schema::hasTable($this->type)) {
            if (in_array($lang, Globals::languages())) {
                $table = explode($lang . '_', $this->type);
                $table = str_replace('_', ' ', $table);
                DB::table($this->type)->insert([
                    'type' => end($table),
                    'language' => $lang,
                    'key' => $valid['key'],
                    'value' => $valid['value']
                ]);
                $this->reset(['key', 'value']);
            }
        }
    }

    function dataAll()
    {
        $data = DB::table($this->type)->simplePaginate();
        return $data;
    }

    public function mount()
    {
        if (!Auth::user()->owner) {
            return redirect()->route('home');
        }

        session()->put('type', request('type'));
        $this->type = session()->get('type');
    }

    public function render()
    {
        return view('livewire.control-panel.create')->with(['type' => $this->type, 'data' => $this->dataAll()]);
    }
}
