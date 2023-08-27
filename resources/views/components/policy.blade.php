<div>
    <div class="flex gap-4">
        <a href="/privacy-policy"
            class="{{ $route == 'privacy-policy' ? 'font-bold' : 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark' }} block grow rounded-t-lg bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark">
            {{ __('me_str.privacy_policy') }}
        </a>
        <a href="/terms-of-service"
            class="{{ $route == 'terms-of-service' ? 'font-bold' : 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark' }} block grow rounded-t-lg bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark">
            {{ __('me_str.terms_of_use') }}
        </a>
    </div>
    <div class="rounded-b-lg bg-secondary-light p-2 dark:bg-secondary-dark">
        {{ $slot }}
    </div>
</div>
