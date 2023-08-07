<div x-data="{ isLang: false }">
    <div class="flex gap-2">
        <form class="flex grow gap-1 rounded-lg bg-secondary-light p-1 dark:bg-secondary-dark"
            wire:submit.prevent='{{ $submitForm }}'>
            <button type="button" wire:click='clearSersh'
                class="flex h-12 w-12 items-center justify-center rounded-s-lg bg-secondary-light hover:text-accent dark:bg-secondary-dark"
                title="{{ __('me_str.clear_search') }}"><i class="fa-solid fa-xmark"></i></button>
            <input type="text"
                class="block h-12 w-full border-accent bg-primary-light p-2 text-lg outline-0 focus:border dark:bg-primary-dark"
                placeholder="{{ __('me_str.search') }}" wire:model.lazy="search" required>
            <button type="submit"
                class="flex h-12 w-12 items-center justify-center rounded-e-lg bg-secondary-light hover:text-accent dark:bg-secondary-dark"
                title="{{ __('me_str.search') }}"><i class="fa-solid fa-search"></i></button>
        </form>
    </div>
</div>
