<div>
    @section('page-index')
        noindex
    @endsection

    @section('page-title')
        {{ __('seo.title_login') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_login') }}
    @endsection

    <x-card>
        <x-title>{{ __('seo.title_login') }}</x-title>

        <form wire:submit="login" class="grid gap-4">
            <span>{{ __('me_str.email') }}</span>
            <x-input type="email" name="email" placeholder="{{ __('me_str.email') }}"></x-input>

            <span>{{ __('me_str.password') }}</span>

            <x-input type="password" name="password" placeholder="{{ __('me_str.password') }}"></x-input>

            <div class="flex justify-between">
                <div class="flex items-center">
                    <input id="checked-checkbox" type="checkbox" wire:model="remember"
                        class="h-4 w-4 rounded focus:ring-2">
                    <label for="checked-checkbox"
                        class="ms-2 text-sm font-medium">{{ __('me_str.remember_me') }}</label>
                </div>

                <x-text-link isNavigate="1">{{ __('me_str.forgot_password') }}</x-text-link>
            </div>

            <x-fill-btn type="submit">{{ __('seo.title_login') }}</x-fill-btn>

            <div>
                <span>{{ __('me_str.not_account') }}</span>
                <x-text-link href="/register" isNavigate="1">{{ __('me_str.new_account') }}</x-text-link>
            </div>

        </form>
    </x-card>

    <div wire:loading.delay>
        <x-wite />
    </div>

    <x-msg />
</div>
