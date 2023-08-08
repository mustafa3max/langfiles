<div class="flex gap-2" x-show="convert[{{ $index }}]">
    <div x-html="{{ $html }}" id="code-0" class="no-scrollbar grow overflow-x-auto"></div>
    <button class="p-2 hover:text-accent" title="{{ __('me_str.delete') }}" x-on:click="removeCode(key)"><i
            class="fa-solid fa-xmark"></i></button>
</div>
