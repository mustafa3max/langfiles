<button class="rounded-lg bg-primary-light p-2 text-secondary-dark dark:bg-secondary-dark dark:text-primary-light"
    x-on:click="isFull=!isFull;is_full(isFull)"
    :title="isFull ? '{{ __('tools.minimize_screen') }}' : '{{ __('tools.full_screen') }}'">
    <div X-show="isFull">
        <x-svg.not-full />
    </div>
    <div X-show="!isFull">
        <x-svg.full />
    </div>
</button>
