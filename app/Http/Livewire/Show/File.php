<?php

namespace App\Http\Livewire\Show;

use App\Http\Globals;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class File extends Component
{
    use WithPagination;

    public $table;
    public $title;
    public $lang;
    public $dataCopy;
    public $data = [];

    function delete($key)
    {
        $this->data[] = $key;
    }

    function undo()
    {
        $this->data = array_slice($this->data, 1);
    }

    function data()
    {
        $data = DB::table($this->table)
            ->where('enabled', true)
            ->whereNotIn('key', $this->data)
            ->get(['key', 'value']);
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


    function types()
    {
        return Table::where('table', 'like', '%' .  $this->title . '%')
            ->where('lang', '!=', $this->lang)
            ->get();
        return Table::where('name_en', $this->table)

            ->get();
    }

    function countItems($table)
    {
        return DB::table($table)->get()->count();
    }
    public function mount()
    {
        $this->table = request('type');

        $this->title = request('type');
        $this->title = explode('_', $this->title);
        $this->lang = $this->title[0];
        $this->title = array_slice($this->title, 1);
        $this->title = implode('_', $this->title);
    }

    public function render()
    {
        return view('livewire.show.file')->with([
            'dataAll' => $this->data()->toArray(),
            'dataCopy' => $this->dataCopy,
            'types' => $this->types(),
            'currentLng' => LaravelLocalization::getCurrentLocale(),
            'share' => Globals::share(__('seo.title_file', ['TYPE' => __('tables.' . $this->title)]))
        ]);
    }
}
