<div>
    @section('page-title')
        {{ __('seo.title_login') }}
    @endsection
    <x-card>
        @component('components.title', ['value' => __('seo.title_login')])
        @endcomponent
        <div class="p-2"></div>

        {{-- Login Direct --}}
        <form wire:submit.prevent="login">
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
                        class="w-4 h-4 rounded focus:ring-2">
                    <label for="checked-checkbox"
                        class="ms-2 text-sm font-medium">{{ __('me_str.remember_me') }}</label>
                </div>

                <div class="grow p-1"></div>

                @component('components.text-button', [
                    'value' => __('me_str.forgot_password'),
                    'route' => '',
                ])
                @endcomponent

            </div>
            <div class="p-2"></div>
            @component('components.raised-button', [
                'value' => __('seo.title_login'),
                'type' => 'submit',
            ])
            @endcomponent

            <div class="p-2"></div>

            <div>
                <span>{{ __('me_str.not_account') }}</span>
                @component('components.text-button-link', [
                    'value' => __('me_str.new_account'),
                    'href' => 'register',
                ])
                    <span>here</span>
                @endcomponent
            </div>

        </form>

    </x-card>
</div>
