<?php

namespace App\Livewire\Show;

use App\Models\Table;
use Convert;
use DB;
use Globals;
use LaravelLocalization;
use Livewire\Component;
use Route;

class Project extends Component
{
    public $lang;

    public $isSessionsQuery = [];
    public $sessionsQuery = [];
    public $newData = [];

    public function updated()
    {
        $this->newData = [];

        for ($index = 0; $index < count($this->isSessionsQuery); $index++) {
            if ($this->isSessionsQuery[$index]) {
                $this->sessionsQuery[$index] = Globals::sections()[$index];
            } else {
                $this->sessionsQuery[$index] = '';
            }
        }

        $tables = Table::where('lang', $this->lang)->pluck('table');

        foreach ($tables as $table) {
            $sections = [];

            $dataTable = DB::table($table)
                ->where('enabled', true)
                ->get(['sections', 'value', 'key']);

            for ($i = 0; $i < count($dataTable); $i++) {
                $sections = array_unique(array_merge($sections, json_decode($dataTable[$i]->sections)));

                foreach ($sections as $section) {
                    if (in_array(str_replace(' ', '_', $section), $this->sessionsQuery)) {
                        if (in_array($section, json_decode($dataTable[$i]->sections))) {
                            $this->newData[$dataTable[$i]->key] = $dataTable[$i]->value;
                        }
                    }
                }
            }
        }
    }

    function mount()
    {
        $this->lang = LaravelLocalization::getCurrentLocale();

        session()->put('route', Route::currentRouteName());
        foreach (Globals::sections() as $_) {
            $this->isSessionsQuery[] = false;
            $this->sessionsQuery[] = '';
        }
    }

    public function render()
    {
        $toJson = [$this->newData];

        return view('livewire.show.project')->with([
            'route' => session()->get('route'),
            'sessions' => Globals::sections(),
            'newData' => $this->newData,
            'json' => Convert::to('json', $toJson),
            'php' => Convert::to('php', $toJson),
            'android' => Convert::to('android', $toJson),
            'ios' => Convert::to('ios', $toJson),
            'django' => Convert::to('django', $toJson),
            'xlf' => Convert::to('xlf', $toJson),
            'csv' => Convert::to('csv', $toJson),
        ]);
    }
}
