<?php

namespace App\Livewire\Show;

use App\Http\Convert;
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
    public $currentLang;
    public $keys = array();

    function delete($key)
    {
        if (!in_array($key, $this->keys)) {
            array_push($this->keys, $key);
        }
    }

    function undo()
    {
        $this->keys = array_slice($this->keys, 1);
    }

    function data()
    {
        foreach (Globals::languages() as $lang) {
            $table = str_replace('type', $lang, $this->table);
            $table = str_replace('-', '_', $table);
            $data[] = DB::table($table)
                ->where('enabled', true)
                ->whereNotIn('key', $this->keys)
                ->get(['key', 'value', 'language'])->toArray();
        }
        return $data;
    }

    function toJson()
    {
        $result = [];

        foreach ($this->data() as $value) {
            $resultNew = [];
            foreach ($value as $v) {
                $arr = array_values((array) $v);
                $resultNew += [$arr[0] => $arr[1]];
            }
            $result[] = $resultNew;
        }
        return $result;
    }

    function moreLang($type)
    {
        $langs = [];
        foreach (Globals::languages() as $lang) {
            $type = str_replace($lang . '_', '', $type);
        }
        foreach (Globals::languages() as $lang) {
            $langs[] = $lang . '_' . $type;
        }
        $lang = $this->currentLang;
        return Table::whereIn('table', $langs)
            ->get()->count();
    }

    function types()
    {
        $table = $this->table;
        $table = str_replace('type_', $this->currentLang . '_', $table);

        return Table::where('lang', $this->currentLang)
            ->where('table', '!=', $table)
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
        $this->currentLang = LaravelLocalization::getCurrentLocale();

        $this->table = request('type');

        $this->title = request('type');
        $this->title = explode('-', $this->title);
        $this->lang = $this->title[0];
        $this->title = array_slice($this->title, 1);
        $this->title = implode('_', $this->title);
    }

    public function render()
    {
        return view('livewire.show.file')->with([
            'json' => Convert::to('json', $this->toJson()),
            'php' => Convert::to('php', $this->toJson()),
            'android' => Convert::to('android', $this->toJson()),
            'ios' => Convert::to('ios', $this->toJson()),
            'django' => Convert::to('django', $this->toJson()),
            'xlf' => Convert::to('xlf', $this->toJson()),
            'csv' => Convert::to('csv', $this->toJson()),
            'html' => Convert::to('html', $this->toJson()),
            'dataEdit' => $this->data(),
            'dataJson' => $this->toJson(),
            'currentLang' => $this->currentLang,
            'share' => Globals::share(__('seo.title_file', ['TYPE' => __('tables.' . $this->title)]))
        ]);
    }
}
