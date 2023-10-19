<?php

namespace App\Livewire\Tools;

use Globals;
use Livewire\Component;
use Stichoza\GoogleTranslate\GoogleTranslate;

class LangtoolLaravel extends Component
{
    public $transKey;
    public $transValue;

    protected $listeners = ['transNow', 'transOneNow', 'transSelectFileNow'];

    function transNow(array $data)
    {
        $validated = $this->validate([
            'transKey' => 'boolean|nullable',
            'transValue' => 'boolean|nullable',
        ]);

        if ($validated['transKey'] || $validated['transValue']) {
            $newData = [];
            foreach ($data as $lang => $files) {
                foreach ($files as $file => $dataAll) {
                    $strKey = new GoogleTranslate('en');
                    $strValue = new GoogleTranslate($lang);
                    foreach ($dataAll as $key => $value) {
                        if ($validated['transKey'] && $validated['transValue']) {
                            $key = $strKey->translate($key);
                            $value = $strValue->translate($value);
                        } else if ($validated['transKey']) {
                            $key = $strKey->translate($key);
                        } else if ($validated['transValue']) {
                            $value = $strValue->translate($value);
                        }

                        $key = Globals::syntaxKey($key);
                        $newData[$lang][$file][$key] = $value;
                    }
                }
            }
            $this->dispatch('done-trans', $newData);
        } else {
            $this->dispatch('message', __('error.trans'));
        }
    }

    function transOneNow($data, $lang, $isKey, $oldKey)
    {
        if (empty($data)) {
            $this->dispatch('message', __('error.trans'));
        } else {

            if ($isKey) {
                $str = new GoogleTranslate('en');
                $data = Globals::syntaxKey($str->translate($data));
            } else {
                $str = new GoogleTranslate($lang);
                $data = $str->translate($data);
            }
            $this->dispatch('done-trans-one', ['data' => $data, 'lang' => $lang, 'isKey' => $isKey, 'oldKey' => $oldKey]);
        }
    }

    function transSelectFileNow(array $data, $lang, $file)
    {
        $validated = $this->validate([
            'transKey' => 'boolean|nullable',
            'transValue' => 'boolean|nullable',
        ]);

        if ($validated['transKey'] || $validated['transValue']) {
            $newData = [];
            $strKey = new GoogleTranslate('en');
            $strValue = new GoogleTranslate($lang);

            foreach ($data as $key => $value) {
                if ($validated['transKey'] && $validated['transValue']) {
                    $key = $strKey->translate($key);
                    $value = $strValue->translate($value);
                } else if ($validated['transKey']) {
                    $key = $strKey->translate($key);
                } else if ($validated['transValue']) {
                    $value = $strValue->translate($value);
                }

                $key = Globals::syntaxKey($key);
                $newData[$key] = $value;
            }
            $this->dispatch('done-trans-select', ['data' => $newData, 'lang' => $lang, 'file' => $file]);
        } else {
            $this->dispatch('message', __('error.trans'));
        }
    }

    public function render()
    {
        return view('livewire.tools.langtool-laravel');
    }
}
