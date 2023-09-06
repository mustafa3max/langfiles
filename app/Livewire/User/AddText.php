<?php

namespace App\Livewire\User;

use App\Http\Globals;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Stichoza\GoogleTranslate\GoogleTranslate;

class AddText extends Component
{
    public $groupName;
    public $langSelectQuery;
    public $currentLang;
    public $isTransKeys = false;
    public $isTransValues = false;
    public $isOldGroup = false;
    public $userId;

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
        session()->put('lang_select', $lang);
        $this->langSelectQuery = $lang;
    }

    function clear()
    {
        session()->forget('message');
    }

    function publish($items)
    {

        if ($this->groupName == null) {
            $this->dispatch('message', __('me_str.require_group_name'));
        }

        $attr = $this->validate();

        $clearInputs = false;

        if (preg_match('/[^A-Za-z0-9-_]/', $attr['groupName'])) {
            $attr['groupName'] = $this->groupNameRand();
        }
        $attr['groupName'] = str_replace(' ', '_', $attr['groupName']);
        $attr['groupName'] = str_replace('-', '_', $attr['groupName']);
        $attr['groupName'] = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $attr['groupName']));
        $attr['groupName'] = trim($attr['groupName'], '_');

        if (!str_contains($attr['groupName'], 'ar_') && !str_contains($attr['groupName'], 'en_')) {
            $attr['groupName'] = $this->langSelectQuery . '_' . $attr['groupName'];
        }

        if (count($items) > 0) {

            if (count($items) > 3000) {
                return $this->dispatch('message', __('me_str.max_count_group'));
            }

            $newItems = [];
            foreach ($items as $key => $value) {
                if ($this->isTransKeys) {
                    $tr = new GoogleTranslate('en');
                    $key = $tr->translate($key);
                }
                if ($this->isTransValues) {
                    $tr = new GoogleTranslate('en');
                    $value = $tr->translate($value);
                }

                $key = Globals::syntaxKey($key);

                if (!preg_match('/[^A-Za-z0-9-_]/', $key)) {
                    $newItems[$key] = $value;
                }
            }

            $typesUsers = Storage::disk('types_users');

            $path = $this->userId . '/' . $attr['groupName'] . '.json';

            if ($typesUsers->exists($path)) {
                try {
                    $data = json_encode($newItems, JSON_UNESCAPED_UNICODE);
                    if (is_object(json_decode($data))) {
                        $clearInputs = $typesUsers->put($path, $data);
                        $this->dispatch('message', __('me_str.msg_save_data'));
                    }
                } catch (\Throwable $th) {
                }
            } else {
                $data = json_encode($newItems, JSON_UNESCAPED_UNICODE);
                if (is_object(json_decode($data))) {
                    $clearInputs = $typesUsers->put($path, $data);
                    $this->dispatch('message', __('me_str.msg_save_data'));
                } else {
                }
            }
        }
        if ($clearInputs) {
            $this->reset('groupName');
        }
        $this->dispatch('clearInputs', $clearInputs);
    }

    function isTrans($isKeys)
    {
        if ($isKeys) {
            $this->isTransKeys = !$this->isTransKeys;
            session()->put('is_trans_keys', $this->isTransKeys);
        } else {
            $this->isTransValues = !$this->isTransValues;
            session()->put('is_trans_values', $this->isTransValues);
        }
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
        $groups = Storage::disk('types_users')->allFiles($this->userId);
        $newGroup = [];
        foreach ($groups as $group) {
            $group = str_replace($this->userId . '/', '', $group);
            $group = str_replace('.json', '', $group);
            $newGroup[] = $group;
        }

        return $newGroup;
    }

    function selectGroup($groupSelect)
    {
        $groups = Storage::disk('types_users')->allFiles($this->userId);
        $path = '';

        foreach ($groups as $group) {
            if (str_contains($group, $groupSelect)) {
                $path = $group;
                break;
            }
        }

        return Storage::disk('types_users')->get($path);
    }

    function changeGroupName($data)
    {
        $this->groupName = $data[0];

        session()->put('is_old_group', $data[1]);
        $this->isOldGroup = session()->pull('is_old_group') ?? false;
    }

    function syntaxes()
    {
        return Cache::get('syntaxes');
    }

    public function mount()
    {
        $this->userId = Auth::id();

        $this->currentLang = LaravelLocalization::getCurrentLocale();
        $this->langSelectQuery = session()->pull('lang_select') ?? $this->currentLang;

        $this->isTransKeys = session()->pull('is_trans_keys') ?? false;
        $this->isTransValues = session()->pull('is_trans_values') ?? false;

        $this->isOldGroup = session()->pull('is_old_group') ?? false;
    }

    public function render()
    {
        return view('livewire.user.add-text')->with([
            'meGroups' => $this->meGroups(),
        ]);
    }
}
