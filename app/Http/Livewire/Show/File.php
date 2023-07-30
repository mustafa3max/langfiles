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
        foreach (Globals::languages() as $lang) {
            $table = str_replace('type', $lang, $this->table);
            $data[] = DB::table($table)
                ->where('enabled', true)
                ->whereNotIn('key', $this->data)
                ->get(['key', 'value', 'language'])->toArray();
        }

        return $data;
    }

    function copy()
    {
        $result = [];

        foreach ($this->data() as $value) {
            $resultNew = [];
            foreach ($value as $v) {
                $arr = array_values((array) $v);
                $resultNew += [$arr[0] => $arr[1]];
            }
            $result[] = json_encode($resultNew, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        return $result;
    }


    function types()
    {
        return Table::where('lang', LaravelLocalization::getCurrentLocale())
            ->inRandomOrder()
            ->take(3)
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
            'dataEdit' => $this->data(),
            'dataJson' => $this->copy(),
            'currentLng' => LaravelLocalization::getCurrentLocale(),
            'share' => Globals::share(__('seo.title_file', ['TYPE' => __('tables.' . $this->title)]))
        ]);
    }
}
