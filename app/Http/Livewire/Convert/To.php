<?php

namespace App\Http\Livewire\Convert;

use Livewire\Component;
use Stichoza\GoogleTranslate\GoogleTranslate;

class To extends Component
{
    public $dataTrans;

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
                return $this->emit('message', __('me_str.max_count_group'));
            }

            $newData = [];
            foreach ($dataJson as $key => $value) {
                if ($isTransKeys) {
                    $key = $tr->translate($key);
                }
                if ($isTransValues) {
                    $value = $tr->translate($value);
                }
                $newData[$key] = $value;
            }
            $this->emit('dataTrans', json_encode($newData, JSON_UNESCAPED_UNICODE));

            $this->dataTrans = $newData;
        }
    }

    function dataTrans($dataTrans)
    {
        return $dataTrans;
    }

    public function render()
    {
        return view('livewire.convert.to')->with([
            'dataTrans' => $this->dataTrans,
        ]);
    }
}
