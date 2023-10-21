<div>
    @section('page-index')
        noindex
    @endsection

    @section('page-title')
        {{ __('seo.title_register') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_register') }}
    @endsection

    <x-card>

        <x-title>{{ __('me_str.new_account') }}</x-title>

        <form wire:submit.prevent="register" class="grid gap-4">
            <span>{{ __('me_str.name') }}</span>

            <x-input type="name" name="name" placeholder="{{ __('me_str.name') }}"></x-input>

            <span>{{ __('me_str.email') }}</span>

            <x-input type="email" name="email" placeholder="{{ __('me_str.email') }}"></x-input>

            <span>{{ __('me_str.password') }}</span>

            <x-input type="password" name="password" placeholder="{{ __('me_str.password') }}"></x-input>

            <div>
                {{ __('me_str.new_account_message') }}
                <x-text-link href="/en/terms-of-service" isExternal="1">{{ __('me_str.terms_of_use') }}</x-text-link>
                {{ __('me_str.terms_of_use') }}
                <x-text-link href="/en/privacy-policy" isExternal="1">{{ __('me_str.privacy_policy') }}</x-text-link>
                .
            </div>

            <x-fill-btn type="submit">{{ __('me_str.register') }}</x-fill-btn>

            <div>
                <span class="text-gray-400">{{ __('me_str.already_account') }}</span>
                <x-text-link href="/login" isNavigate="1">{{ __('seo.title_login') }}</x-text-link>
            </div>
        </form>

    </x-card>

    <div wire:loading.delay>
        <x-wite />
    </div>

    <x-msg />
</div>
