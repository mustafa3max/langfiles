<x-card>
    <div class="grid text-center">
        <h1 class="text-xl font-bold bg-primary-light dark dark:bg-primary-dark p-4 rounded-t-lg">
            {{ __('me_str.empty_page_title') }}
        </h1>
        <div class="grid gap-4 border-4 border-primary-light dark dark:border-primary-dark p-4 rounded-b-lg">
            <p>{{ __('me_str.empty_page_desc') }}</p>
            <a href="{{ $route }}" class="text-accent hover:underline cursor-pointer">
                {{ __('me_str.reload') }}
            </a>
        </div>
    </div>
</x-card>
