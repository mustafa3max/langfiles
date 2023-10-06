    <div class="grid w-full pb-2 text-center">
        <h2 class="dark rounded-t-lg bg-primary-light p-4 text-xl font-bold dark:bg-primary-dark">
            {{ __('me_str.empty_page_title') }}
        </h2>
        <div class="dark grid gap-4 rounded-b-lg border-4 border-primary-light p-4 dark:border-primary-dark">
            <p>{{ __('me_str.empty_page_desc') }}</p>
            @if ($isReload ?? true)
                <x-text-link href="{{ $route }}" isNavigate="1">{{ __('me_str.reload') }}</x-text-link>
            @endif
        </div>
    </div>
