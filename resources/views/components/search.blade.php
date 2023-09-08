<div x-data="{ isLang: false }">
    <div class="flex gap-2">
        <form class="flex grow gap-1 rounded-lg bg-primary-light p-1 dark:bg-primary-dark"
            wire:submit='{{ $submitForm }}'>
            <button type="button" @if ($search != null) wire:click='clearSersh' @endif
                class="flex h-12 w-12 items-center justify-center rounded-s-lg bg-primary-light hover:text-accent dark:bg-primary-dark"
                title="{{ __('me_str.clear_search') }}"><x-svg.x /></button>
            <input type="text"
                class="block h-12 w-full border-2 border-secondary-light bg-primary-light p-2 text-lg outline-0 focus:border focus:border-accent dark:border-secondary-dark dark:bg-primary-dark dark:focus:border-accent"
                placeholder="{{ __('me_str.search') }}" wire:model="search" required>
            <button type="submit"
                class="flex h-12 w-12 items-center justify-center rounded-e-lg bg-primary-light hover:text-accent dark:bg-primary-dark"
                title="{{ __('me_str.search') }}"><x-svg.search /></button>
        </form>
    </div>
</div>
