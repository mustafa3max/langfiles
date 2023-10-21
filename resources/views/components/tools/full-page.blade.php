<button
    class="rounded-lg border-2 border-primary-light bg-primary-light p-2 text-secondary-dark hover:border-accent hover:text-accent dark:border-secondary-dark dark:bg-secondary-dark dark:text-primary-light dark:hover:border-accent dark:hover:text-accent"
    x-on:click="isFull=!isFull;is_full(isFull)"
    :title="isFull ? '{{ __('tools.minimize_screen') }}' : '{{ __('tools.full_screen') }}'">
    <div X-show="isFull">
        <x-svg.not-full />
    </div>
    <div X-show="!isFull">
        <x-svg.full />
    </div>
</button>
