<div>
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
            <a href='/user/logout' class="hover:underline">{{ __('me_str.logout') }}</a>
        </div>
    </x-card>
</div>
