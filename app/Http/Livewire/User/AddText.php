<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Stichoza\GoogleTranslate\GoogleTranslate;

class AddText extends Component
{
    public $groupName;
    public $langSelect;
    public $currentLang;
    public $isTrans = false;

    protected $rules = [
        'groupName' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    protected $listeners = ['clearInputs', 'changeGroupName'];

    function langSelect($lang)
    {
        $this->langSelect = $lang;
        session()->put('lang_select', $lang);
    }

    function publish($items)
    {
        $attr = $this->validate();

        $clearInputs = false;
        $userId = 1;

        if (preg_match('/[^A-Za-z0-9-_]/', $attr['groupName'])) {
            $attr['groupName'] = $this->groupNameRand();
        }
        $attr['groupName'] = str_replace(' ', '_', $attr['groupName']);
        $attr['groupName'] = str_replace('-', '_', $attr['groupName']);
        $attr['groupName'] = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $attr['groupName']));
        $attr['groupName'] = trim($attr['groupName'], '_');

        $attr['groupName'] = $this->langSelect . '_' . $attr['groupName'];

        if (count($items) > 0) {

            $newItems = [];
            foreach ($items as $key => $value) {
                if ($this->isTrans) {
                    $tr = new GoogleTranslate('en');
                    $key = $tr->translate($key);
                }
                $key = str_replace(' ', '_', $key);
                $key = str_replace('-', '_', $key);
                $key = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));
                $key = trim($key, '_');

                if (!preg_match('/[^A-Za-z0-9-_]/', $key)) {
                    $newItems[$key] = $value;
                }
            }

            $typesUsers = Storage::disk('types_users');

            $path = $userId . '/' . $attr['groupName'] . '.json';

            if ($typesUsers->exists($path)) {
                try {
                    $data = json_encode($newItems, JSON_UNESCAPED_UNICODE);
                    // $newData = array_merge($oldData, $newItems);

                    // $newData = json_encode($newData, JSON_UNESCAPED_UNICODE);

                    if (is_object(json_decode($data))) {
                        $clearInputs = $typesUsers->put($path, $data);
                    }
                } catch (\Throwable $th) {
                }
            } else {
                $data = json_encode($newItems, JSON_UNESCAPED_UNICODE);
                if (is_object(json_decode($data))) {
                    $clearInputs = $typesUsers->put($path, $data);
                } else {
                }
            }
        }
        if ($clearInputs) {
            $this->reset('groupName');
        }
        $this->emit('clearInputs', $clearInputs);
    }

    function isTrans()
    {
        $this->isTrans = !$this->isTrans;
        session()->put('is_trans', $this->isTrans);
    }

    function clearInputs($isClear = false): bool
    {
        return $isClear;
    }

    function groupNameRand()
    {
        $chars = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        $chars = array_slice($chars, 0, 10);
        shuffle($chars);
        $chars = implode('', $chars);
        return $chars;
    }

    function meGroups()
    {
        $userId = 1;

        $groups = Storage::disk('types_users')->allFiles($userId);
        $newGroup = [];
        foreach ($groups as $group) {
            $group = str_replace($userId . '/', '', $group);
            $group = str_replace('.json', '', $group);
            $group = str_replace('ar_', '', $group);
            $group = str_replace('en_', '', $group);
            $newGroup[] = $group;
        }

        return $newGroup;
    }

    function selectGroup($groupSelect)
    {
        $userId = 1;
        $groups = Storage::disk('types_users')->allFiles($userId);
        $path = '';

        foreach ($groups as $group) {
            if (str_contains($group, $groupSelect)) {
                $path = $group;
                break;
            }
        }
        return Storage::disk('types_users')->get($path);
    }

    function changeGroupName($groupName)
    {
        $this->groupName = $groupName;
    }

    public function mount()
    {
        $this->currentLang = LaravelLocalization::getCurrentLocale();
        $this->langSelect = session()->pull('lang_select') ?? $this->currentLang;

        $this->isTrans = session()->pull('is_trans') ?? false;
    }

    public function render()
    {
        return view('livewire.user.add-text')->with([
            'meGroups' => $this->meGroups(),
        ]);
    }
}
