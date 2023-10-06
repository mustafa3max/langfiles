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
        @component('components.title', ['value' => __('me_str.new_account')])
        @endcomponent
        <div class="p-2"></div>

        {{-- Register Direct --}}
        <form wire:submit.prevent="register">
            <span>{{ __('me_str.name') }}</span>
            <div class="p-1"></div>
            @component('components.input', [
                'required' => 'required',
                'type' => 'name',
                'name' => 'name',
                'placeholder' => __('me_str.name'),
                'disabled' => '',
                'message' => '{{ $message }}',
            ])
            @endcomponent
            <div class="p-2"></div>
            <span>{{ __('me_str.email') }}</span>
            <div class="p-1"></div>
            @component('components.input', [
                'required' => 'required',
                'type' => 'email',
                'name' => 'email',
                'placeholder' => __('me_str.email'),
                'disabled' => '',
                'message' => '{{ $message }}',
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
                'disabled' => '',
                'message' => '{{ $message }}',
            ])
            @endcomponent
            <div class="p-2"></div>
            <div class="text-gray-400">
                {{ __('me_str.new_account_message') }}
                <x-text-link href="/en/terms-of-service" isExternal="1">{{ __('me_str.terms_of_use') }}</x-text-link>
                {{ __('me_str.terms_of_use') }}
                <x-text-link href="/en/privacy-policy" isExternal="1">{{ __('me_str.privacy_policy') }}</x-text-link>
                .
            </div>
            <div class="p-2"></div>
            @component('components.raised-button', [
                'value' => __('me_str.register'),
                'type' => 'submit',
                'icon' => 'user-plus',
            ])
            @endcomponent

            <div class="p-2"></div>
            <div>
                <span class="text-gray-400">{{ __('me_str.already_account') }}</span>
                <x-text-link href="/login" isExternal="1">{{ __('seo.title_login') }}</x-text-link>
            </div>
        </form>

    </x-card>

    <div wire:loading.delay>
        <x-wite />
    </div>
</div>
