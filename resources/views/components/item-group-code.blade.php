<div class="flex gap-2" x-show="convert[{{ $index }}]">
    <div x-html="convert[{{ $index }}]?{{ $html }}:[]" class="no-scrollbar grow overflow-x-auto"></div>
    <button class="p-2 hover:text-accent" title="{{ __('me_str.delete') }}"
        x-on:click="removeCode(key, Alpine.store('group').languages);Alpine.store('group').meCode= JSON.parse(localStorage.getItem(lang+'CodeAll'));countMeCode= countCode();
        isSelectTab = Object.keys(Alpine.store('group').meCode).length > 0 ? [true, false] : []"><x-svg.x /></button>

</div>
