<div class="grid gap-2">
    {{-- Translate Keys --}}
    <div class="flex items-center gap-2 rounded-lg border-2 border-primary-light p-2 dark:border-primary-dark">
        <button x-on:click='isTransKeys=!isTransKeys'
            :class="isTransKeys ? 'bg-accent text-primary-light ' : 'bg-primary-light dark:bg-primary-dark'"
            class="block rounded-lg p-2 font-bold"
            x-text="isTransKeys?'{{ __('me_str.disabled') }}':'{{ __('me_str.enabled') }}'"></button>
        <p class="grow py-2 text-start">
            {{ __('me_str.message_add_text_keys') }}</p>
        <span class="text-accent" x-show="isTransKeys">
            <x-svg.check />
        </span>

        <span x-show="!isTransKeys">
            <x-svg.x />
        </span>
    </div>
    <div class="flex items-center gap-2 rounded-lg border-2 border-primary-light p-2 dark:border-primary-dark">
        <button x-on:click='isTransValues=!isTransValues'
            :class="isTransValues ? 'bg-accent text-primary-light' : 'bg-primary-light dark:bg-primary-dark'"
            class="block rounded-lg p-2 font-bold"
            x-text="isTransValues?'{{ __('me_str.disabled') }}':'{{ __('me_str.enabled') }}'"></button>
        <p class="grow py-2 text-start">
            {{ __('me_str.message_add_text_values') }}</p>
        <span class="text-accent" x-show="isTransValues">
            <x-svg.check />
        </span>

        <span x-show="!isTransValues">
            <x-svg.x />
        </span>
    </div>
</div>
