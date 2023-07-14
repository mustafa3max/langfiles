<div x-data="{ isLang: false }">
    <div class="flex gap-2">
        <form class="grow flex bg-secondary-light dark:bg-secondary-dark rounded-lg p-1 gap-1"
            wire:submit.prevent='{{ $submitForm }}'>
            <button type="button" wire:click='clearSersh'
                class="w-12 h-12  bg-secondary-light dark:bg-secondary-dark rounded-s-lg hover:text-accent flex items-center justify-center"><i
                    class="fa-solid fa-xmark"></i></button>
            <input type="text" class="block w-full bg-primary-light dark:bg-primary-dark p-2 text-lg h-12"
                placeholder="{{ __('me_str.search') }}" wire:model.lazy="search" required>
            <button type="submit"
                class="w-12 h-12 bg-secondary-light dark:bg-secondary-dark rounded-e-lg hover:text-accent flex items-center justify-center"><i
                    class="fa-solid fa-search"></i></button>
        </form>
        @if (($languages ?? null) != null)
            <button type="button" x-on:click="isLang=!isLang"
                class="w-14 h-14 bg-secondary-light dark:bg-secondary-dark rounded-lg hover:bg-transparent hover:border hover:text-accent flex items-center justify-center"><i
                    class="fa-solid fa-angle-down"></i></button>
        @endif

    </div>
    @if (($languages ?? null) != null)
        <div class="bg-secondary-light dark:bg-secondary-dark rounded-lg p-2 mt-2 flex flex-wrap gap-2 items-center justify-center"
            x-show="isLang" x-transition.duration.500ms>
            @foreach ($languages as $lang)
                <button type="button" wire:click='isLang("{{ $lang }}")'
                    class="bg-primary-light dark:bg-primary-dark p-2 rounded-lg hover:bg-accent hover:dark:bg-accent">{{ __('lang.' . $lang) }}</button>
            @endforeach
            <button type="button" wire:click='isLang("")'
                class="bg-primary-light dark:bg-primary-dark p-2 rounded-lg hover:bg-accent hover:dark:bg-accent">{{ __('me_str.all') }}</button>
        </div>
    @endif

</div>
