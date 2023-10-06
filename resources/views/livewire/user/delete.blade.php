<div>
    @section('page-index')
        noindex
    @endsection

    @section('page-title')
        {{ __('seo.title_delete_account', ['USER' => $user->name]) }}
    @endsection

    @section('page-description')
        {{ __('seo.description_delete_account', ['USER' => $user->name]) }}
    @endsection

    <x-card>
        <p class="text-center">{{ __('seo.description_delete_account') }}</p>
        <form wire:submit="delete">
            <div>
                <span class="block pb-2">{{ __('me_str.email') }}</span>
                @component('components.input', [
                    'required' => 'required',
                    'type' => 'email',
                    'name' => 'email',
                    'placeholder' => __('me_str.email'),
                ])
                @endcomponent
            </div>
            <div class="p-2"></div>
            <div>
                <span class="block pb-2">{{ __('me_str.password') }}</span>
                @component('components.input', [
                    'required' => 'required',
                    'type' => 'password',
                    'name' => 'password',
                    'placeholder' => __('me_str.password'),
                ])
                @endcomponent
            </div>
            <div class="p-2"></div>
            @component('components.raised-button', [
                'value' => __('seo.title_delete_account'),
                'type' => 'submit',
                'icon' => 'right-to-bracket',
            ])
            @endcomponent
        </form>
    </x-card>

    <div wire:loading.delay wire:target="delete">
        <x-wite />
    </div>

    <x-msg />
</div>
