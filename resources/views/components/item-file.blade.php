<div class="grid grow rounded-lg bg-secondary-light dark:bg-secondary-dark md:flex md:gap-2" dir="ltr">
    <div class="flex items-center justify-center gap-2 px-2">
        <span class="w-10 text-accent md:hidden">{{ __('me_str.key') }}</span>
        <div class="h-4 border-s border-primary-light dark:border-primary-dark md:hidden"></div>
        <p class="grow p-2 md:text-accent">{{ $data->key }}</p>
    </div>

    <div class="mx-2 border-t border-primary-light dark:border-primary-dark md:hidden"></div>

    <div class="flex grow items-center gap-2 px-2">
        <span class="w-10 text-accent md:hidden">{{ __('me_str.value') }}</span>
        <div class="h-4 border-s border-primary-light dark:border-primary-dark"></div>
        <p class="grow p-2">{{ $data->value }}</p>
    </div>

    <button class="m-1 flex h-12 w-12 items-center justify-center rounded-lg hover:bg-accent"
        wire:click='delete("{{ $data->key }}")' title="{{ __('me_str.remove_key') }}"><i
            class="fa-solid fa-xmark"></i></button>
</div>
