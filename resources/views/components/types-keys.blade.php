<div>
    <div class="flex gap-4">
        <a href="/types"
            class="{{ $route == 'types' ? 'font-bold' : 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark' }} block grow rounded-t-lg bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark">
            {{ __('me_str.by_type') }}
        </a>
        <a href="/keys"
            class="{{ $route == 'keys' ? 'font-bold' : 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark' }} block grow rounded-t-lg bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark">
            {{ __('me_str.all') }}
        </a>
    </div>
    <div class="rounded-b-lg bg-secondary-light p-2 dark:bg-secondary-dark">
        {{ $slot }}
    </div>
</div>
