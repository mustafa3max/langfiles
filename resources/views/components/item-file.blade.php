<div class="no-scrollbar flex grow items-center gap-3 overflow-x-scroll rounded-lg bg-secondary-light px-3 dark:bg-secondary-dark"
    dir="ltr" wire:key='{{ $data->language . $data->key }}'>
    <span class="font-semibold text-code-1-light dark:text-code-1-dark">{{ $data->key }}</span>

    <div class="h-3 border-s"></div>

    <span class="font-semibold text-code-2-light dark:text-code-2-dark">{{ $data->value }}</span>
    <div class="flex grow justify-end">
        <button x-show="!isGroup" class="m-1 flex h-12 items-center justify-center rounded-lg hover:text-accent"
            wire:click='delete("{{ $data->key }}")' title="{{ __('me_str.remove_key') }}"><i
                class="fa-solid fa-xmark"></i></button>
        @component('components.add-del-item-me-code', ['data' => $data, 'file' => $file])
        @endcomponent
    </div>
</div>
