<?php

namespace App\Livewire\Show;

use App\Http\Convert;
use App\Http\Globals;
use App\Models\Table;
use Livewire\Component;
use Livewire\WithPagination;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Storage;

class File extends Component
{
    use WithPagination;

    public $table;
    public $title;
    public $lang;
    public $currentLang;
    public $keys = array();
    public $langNow;

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

    function json()
    {
        $allJson = [];

        foreach (Globals::languages() as $lang) {
            $table = str_replace('type', $lang, $this->table);
            $table = str_replace('-', '_', $table);
            $table = $table . '.json';
            $json = Storage::disk(Globals::diskTypes())->get($table);
            $json = json_decode($json, true);
            foreach ($this->keys as $key) {
                unset($json[$key]);
            }
            $allJson[$lang] = $json;
        }

        return $allJson;
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

    function selectLang($lang)
    {
        $this->langNow = $lang;
    }

    public function mount()
    {
        $this->currentLang = LaravelLocalization::getCurrentLocale();
        $this->langNow = $this->currentLang;
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
            'json' => Convert::to('json', $this->json()),
            'php' => Convert::to('php', $this->json()),
            'android' => Convert::to('android', $this->json()),
            'ios' => Convert::to('ios', $this->json()),
            'django' => Convert::to('django', $this->json()),
            'xlf' => Convert::to('xlf', $this->json()),
            'csv' => Convert::to('csv', $this->json()),
            'html' => Convert::to('html', $this->json()),
            'data' => $this->json(),
            'currentLang' => $this->currentLang,
            'share' => Globals::share(__('seo.title_file', ['TYPE' => __('tables.' . $this->title)])),
        ]);
    }
}
