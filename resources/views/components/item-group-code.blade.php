<div class="flex gap-2" x-show="convert[{{ $index }}]">
    <div x-html="convert[{{ $index }}]?{{ $html }}:[]" class="no-scrollbar grow overflow-x-auto"></div>
    <button class="p-2 hover:text-accent" title="{{ __('me_str.delete') }}"
        x-on:click="removeCode(key, ['{{ Globals::languages()[0] }}','{{ Globals::languages()[1] }}']);meCode= JSON.parse(localStorage.getItem(lang+'CodeAll'));countMeCode= countCode()"><i
            class="fa-solid fa-xmark"></i></button>

</div>
