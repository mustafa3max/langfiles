<div x-data="{ isLang: false }">
    <div class="flex gap-2">
        <form class="flex grow gap-1 rounded-lg bg-primary-light p-1 dark:bg-primary-dark"
            wire:submit.prevent='{{ $submitForm }}'>
            <button type="button" wire:click='clearSersh'
                class="flex h-12 w-12 items-center justify-center rounded-s-lg bg-primary-light hover:text-accent dark:bg-primary-dark"
                title="{{ __('me_str.clear_search') }}"><x-svg.x /></button>
            <input type="text"
                class="block h-12 w-full border-accent bg-secondary-light p-2 text-lg outline-0 focus:border dark:bg-secondary-dark"
                placeholder="{{ __('me_str.search') }}" wire:model.lazy="search" required>
            <button type="submit"
                class="flex h-12 w-12 items-center justify-center rounded-e-lg bg-primary-light hover:text-accent dark:bg-primary-dark"
                title="{{ __('me_str.search') }}"><x-svg.search /></button>
        </form>
    </div>
</div>
