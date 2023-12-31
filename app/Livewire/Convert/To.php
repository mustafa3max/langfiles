<?php

namespace App\Livewire\Convert;

use App\Http\Globals;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Stichoza\GoogleTranslate\GoogleTranslate;

class To extends Component
{
    public $dataTransQuery;

    protected $listeners = ['transNow', 'dataTrans'];

    function transNow($data)
    {
        $dataJson = $data['data'];

        $isTransKeys = $data['isTransKeys'];
        $isTransValues = $data['isTransValues'];

        if ($isTransKeys || $isTransValues) {
            $tr = new GoogleTranslate('en');

            $dataJson = json_decode($dataJson);

            if (count((array)$dataJson) > 3000) {
                return $this->dispatch('message', __('me_str.max_count_group'));
            }

            $newData = [];
            foreach ($dataJson as $key => $value) {
                if ($isTransKeys) {
                    $key = $tr->translate($key);
                }
                if ($isTransValues) {
                    $value = $tr->translate($value);
                }

                $key = Globals::syntaxKey($key);
                $newData[$key] = $value;
            }
            $this->dispatch('dataTrans', json_encode($newData));

            $this->dataTransQuery =  json_encode($newData, JSON_UNESCAPED_UNICODE);
        }
    }

    function dataTrans($dataTrans)
    {
        return $dataTrans;
    }

    function syntaxes()
    {
        return Cache::get('syntaxes');
    }

    public function render()
    {
        return view('livewire.convert.to')->with([
            'syntaxes' => json_encode($this->syntaxes())
        ]);
    }
}
