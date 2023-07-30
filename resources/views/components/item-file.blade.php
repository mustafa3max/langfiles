<div class="grid md:flex md:gap-2 bg-secondary-light dark:bg-secondary-dark rounded-lg grow" dir="ltr">
    <div class="flex items-center justify-center gap-2 px-2">
        <span class="w-10 text-accent md:hidden">{{ __('me_str.key') }}</span>
        <div class="border-s border-primary-light dark:border-primary-dark h-4 md:hidden"></div>
        <p class="p-2 grow md:text-accent">{{ $data->key }}</p>
    </div>

    <div class="border-t border-primary-light dark:border-primary-dark md:hidden mx-2"></div>

    <div class="flex items-center gap-2 grow px-2">
        <span class="w-10 text-accent md:hidden">{{ __('me_str.value') }}</span>
        <div class="border-s border-primary-light dark:border-primary-dark h-4"></div>
        <p class="p-2 grow">{{ $data->value }}</p>
    </div>

    <button class="hover:bg-accent rounded-lg w-12 h-12 flex justify-center items-center m-1"
        wire:click='delete("{{ $data->key }}")' title="{{ __('me_str.remove_key') }}"><i
            class="fa-solid fa-xmark"></i></button>
</div>
