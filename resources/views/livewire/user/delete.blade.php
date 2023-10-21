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
        <x-desc>{{ __('seo.description_delete_account') }}</x-desc>
        <form wire:submit="delete">
            <div>
                <span class="block pb-2">{{ __('me_str.email') }}</span>

                <x-input type="email" name="email" placeholder="{{ __('me_str.email') }}"></x-input>

            </div>
            <div class="p-2"></div>
            <div>
                <span class="block pb-2">{{ __('me_str.password') }}</span>

                <x-input type="password" name="password" placeholder="{{ __('me_str.password') }}"></x-input>

            </div>
            <div class="p-2"></div>
            <x-fill-btn type="submit">{{ __('seo.title_delete_account') }}</x-fill-btn>
        </form>
    </x-card>

    <div wire:loading.delay wire:target="delete">
        <x-wite />
    </div>

    <x-msg />
</div>
