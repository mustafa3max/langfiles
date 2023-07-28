<div class="grid md:flex gap-2 bg-primary-light dark:bg-primary-dark rounded-lg ps-2 grow" dir="ltr">
    <div class="flex items-center justify-center gap-2">
        <span class="w-10 text-accent md:hidden">{{ __('me_str.key') }}</span>
        <span class="border-s border-secondary-light dark:border-secondary-dark h-4 md:hidden"></span>
        <p class="p-2 grow md:text-accent">{{ $data->key }}</p>
    </div>

    <span class="border-t border-secondary-light dark:border-secondary-dark h-4 md:hidden"></span>

    <div class="flex items-center gap-2 grow">
        <span class="w-10 text-accent md:hidden">{{ __('me_str.value') }}</span>
        <span class="border-s border-secondary-light dark:border-secondary-dark h-4"></span>
        <p class="p-2 grow">{{ $data->value }}</p>
    </div>

    <button class="hover:bg-accent rounded-lg w-12 h-12 flex justify-center items-center m-1"
        wire:click='delete("{{ $data->key }}")' title="{{ __('me_str.remove_key') }}"><i
            class="fa-solid fa-xmark"></i></button>
</div>
