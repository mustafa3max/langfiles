<?php

namespace App\Http\Livewire\Show;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class File extends Component
{
    use WithPagination;

    public $table;
    public $dataCopy;
    public $data = [];

    function delete($key)
    {
        $this->data[] = $key;
    }

    function data()
    {
        $data = DB::table($this->table)->where('enabled', false)->whereNotIn('key', $this->data)->get(['key', 'value']);
        return $data;
    }

    function copy()
    {
        $result = [];
        foreach ($this->data() as $value) {
            $arr = array_values((array) $value);
            $result += [$arr[0] => $arr[1]];
        }

        $this->dataCopy = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function mount()
    {
        $this->table = request('type');
    }

    public function render()
    {
        return view('livewire.show.file')->with(['dataAll' => $this->data()->toArray(), 'dataCopy' => $this->dataCopy]);
    }
}
