<?php

namespace App\Http\Livewire\Show;

use App\Http\Globals;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use SimpleXMLElement;

class File extends Component
{
    use WithPagination;

    public $table;
    public $title;
    public $lang;
    public $keys = [];

    function delete($key)
    {
        $this->keys[] = $key;
    }

    function undo()
    {
        $this->keys = array_slice($this->keys, 1);
    }

    function data()
    {
        foreach (Globals::languages() as $lang) {
            $table = str_replace('type', $lang, $this->table);
            $data[] = DB::table($table)
                ->where('enabled', true)
                ->whereNotIn('key', $this->keys)
                ->get(['key', 'value', 'language'])->toArray();
        }
        return $data;
    }

    function convertTo($type)
    {
        $dataAll = [];
        foreach ($this->toJson() as $values) {
            $data = '';
            foreach ($values as $key => $value) {
                if ($type == 'json') {
                    $data .= "<p>" . '<span class="text-code-1-light dark:text-code-1-dark">"' . $key . '"</span>: '  . '<span class="text-code-2-light dark:text-code-2-dark">"' . $value . '"</span>,' . "</p>";
                } elseif ($type == 'php') {
                    $data .= "<p>" . '<span class="text-code-1-light dark:text-code-1-dark">"' . $key . '"</span> => '  . '<span class="text-code-2-light dark:text-code-2-dark">"' . $value . '"</span>,' . "</p>";
                } elseif ($type == 'android') {
                    $data .= "<p>"
                        .
                        "<span class=\"text-code-2-light dark:text-code-2-dark\">"
                        .
                        "&#x3c;string "
                        .
                        "</span>"
                        .
                        "<span class=\"text-code-1-light dark:text-code-1-dark\">"
                        . "name=\"" . $key . "\"" .
                        "</span>"
                        .
                        "<span class=\"text-code-2-light dark:text-code-2-dark\">></span>"
                        . $value .
                        "<span class=\"text-code-2-light dark:text-code-2-dark\">"
                        .
                        "&#x3c;/string>"
                        .
                        "</span>"
                        .
                        "</p>";
                } elseif ($type == 'ios') {
                    $data .= "<p>" . '<span class="text-code-1-light dark:text-code-1-dark">"' . $key . '"</span> = '  . '<span class="text-code-2-light dark:text-code-2-dark">"' . $value . '"</span>;' . "</p>";
                }
            }
            $dataAll[] = $data;
        }
        return $dataAll;
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
            'json' => $this->convertTo('json'),
            'php' => $this->convertTo('php'),
            'android' => $this->convertTo('android'),
            'ios' => $this->convertTo('ios'),
            'dataEdit' => $this->data(),
            'dataJson' => $this->toJson(),
            'currentLng' => LaravelLocalization::getCurrentLocale(),
            'share' => Globals::share(__('seo.title_file', ['TYPE' => __('tables.' . $this->title)]))
        ]);
    }
}
