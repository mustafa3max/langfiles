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
        @component('components.title', ['value' => __('seo.title_login')])
        @endcomponent
        <div class="p-2"></div>

        {{-- Login Direct --}}
        <form wire:submit="login">
            <span>{{ __('me_str.email') }}</span>
            <div class="p-1"></div>
            @component('components.input', [
                'required' => 'required',
                'type' => 'email',
                'name' => 'email',
                'placeholder' => __('me_str.email'),
            ])
            @endcomponent
            <div class="p-2"></div>
            <span>{{ __('me_str.password') }}</span>
            <div class="p-1"></div>
            @component('components.input', [
                'required' => 'required',
                'type' => 'password',
                'name' => 'password',
                'placeholder' => __('me_str.password'),
            ])
            @endcomponent
            <div class="p-2"></div>
            <div class="flex">
                <div class="flex items-center">
                    <input id="checked-checkbox" type="checkbox" wire:model="remember"
                        class="h-4 w-4 rounded focus:ring-2">
                    <label for="checked-checkbox"
                        class="ms-2 text-sm font-medium">{{ __('me_str.remember_me') }}</label>
                </div>

                <div class="grow p-1"></div>

                <x-text-link isNavigate="1">{{ __('me_str.forgot_password') }}</x-text-link>

            </div>
            <div class="p-2"></div>
            @component('components.raised-button', [
                'value' => __('seo.title_login'),
                'type' => 'submit',
                'icon' => 'right-to-bracket',
            ])
            @endcomponent

            <div class="p-2"></div>

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
