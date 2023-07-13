<?php

namespace App\Http\Livewire\ControlPanel;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class Update extends Component
{
    public $key;
    public $value;
    public $type;
    public $isKey;
    public $idFile;
    public $isForm = [];
    public $isDelete = [];

    public $languages = ['ar', 'en'];

    protected function rules()
    {
        if ($this->isKey) {
            return [
                'key' => 'required|min:2|max:255|unique:' .  $this->type,
            ];
        } else {
            return [
                'value' => 'required|min:2|max:255|unique:' .  $this->type,
            ];
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    function update($index)
    {
        $valid = $this->validate();

        $lang = $this->type[0] . $this->type[1];

        if (Schema::hasTable($this->type)) {
            if (in_array($lang, $this->languages)) {
                $table = explode($lang . '_', $this->type);
                $table = str_replace('_', ' ', $table);
                if ($this->isKey) {
                    DB::table($this->type)->where('id', $this->idFile)->update([
                        'key' => $valid['key']
                    ]);
                    $this->reset(['key']);
                } else {
                    DB::table($this->type)->where('id', $this->idFile)->update([
                        'value' => $valid['value']
                    ]);
                    $this->reset(['value']);
                }
                $this->isForm[$index] = false;
            }
        }
    }

    function delete()
    {

        $lang = $this->type[0] . $this->type[1];

        if (Schema::hasTable($this->type)) {
            if (in_array($lang, $this->languages)) {
                $table = explode($lang . '_', $this->type);
                $table = str_replace('_', ' ', $table);
                $data = DB::table($this->type)->where('id', $this->idFile)->get('key')->first();
                if ($this->key === $data->key) {
                    DB::table($this->type)->where('id', $this->idFile)->delete();
                    $this->reset(['key']);
                }
            }
        }
    }

    function isUpdate($data, $isKey, $id, $index)
    {
        $this->isKey = $isKey;
        $this->idFile = $id;
        for ($i = 0; $i < count($this->isForm); $i++) {
            $this->isForm[$i] = false;
        }
        $this->isForm[$index] = true;
        if ($isKey) {
            $this->key = $data;
        } else {
            $this->value = $data;
        }
    }

    function isDelete($id, $index)
    {
        $this->isKey = true;
        $this->idFile = $id;
        for ($i = 0; $i < count($this->isDelete); $i++) {
            $this->isDelete[$i] = false;
        }
        $this->isDelete[$index] = true;
    }

    function close($isDelete)
    {
        if ($isDelete) {
            for ($i = 0; $i < count($this->isDelete); $i++) {
                $this->isDelete[$i] = false;
            }
        } else {
            for ($i = 0; $i < count($this->isForm); $i++) {
                $this->isForm[$i] = false;
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
        return view('livewire.control-panel.update')->with(['type' => $this->type, 'dataAll' => $this->dataAll()]);
    }
}
