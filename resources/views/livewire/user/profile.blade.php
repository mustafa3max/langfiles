<div>
    @section('page-index')
        noindex
    @endsection

    @section('page-title')
        {{ __('seo.title_profile', ['USER' => $user->name]) }}
    @endsection

    @section('page-description')
        {{ __('seo.description_profile', ['USER' => $user->name]) }}
    @endsection

    <x-card>
        <img src="{{ $user->avatar ?? asset('assets/images/logo.svg') }}" alt="{{ $user->name }}"
            class="mx-auto h-24 w-24 rounded-full border-2 border-primary-light p-1 shadow-sm dark:border-primary-dark">

        <div class="grid gap-2 pt-4 text-center">
            <h1 class="font-semibold uppercase">{{ $user->name }}</h1>
            <p>{{ $user->email }}</p>
            <div class="flex">
                <x-text-link href="user/logout" isNavigate="1">{{ __('me_str.logout') }}</x-text-link>
                <div class="grow"></div>
                <x-text-link href="user/delete-account" isNavigate="1">{{ __('seo.title_delete_account') }}</x-text-link>
            </div>
        </div>
    </x-card>
</div>
