<div>
    @section('page-index')
        noindex
    @endsection

    @section('page-title')
        {{ __('seo.title_call_us') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_call_us') }}
    @endsection

    <x-card>
        <x-title>{{ __('me_str.call_us') }}</x-title>
        <x-desc>{{ __('seo.description_call_us') }}</x-desc>

        <form wire:submit="sendMessage" class="grid gap-4">
            <div>
                <label class="block py-2">{{ __('me_str.email') }}</label>
                <x-input placeholder="{{ __('me_str.email') }}" name="email" />
            </div>
            <div>
                <label class="block py-2">{{ __('me_str.title') }}</label>
                <x-input placeholder="{{ __('me_str.title') }}" name="title" />
            </div>
            <div>
                <label class="block py-2">{{ __('me_str.your_message') }}</label>
                <textarea class="w-full rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark" rows="6"
                    placeholder="{{ __('me_str.your_message') }}" required wire:model="message"></textarea>
            </div>

            <x-fill-btn type="submit">{{ __('me_str.send_message') }}</x-fill-btn>
        </form>
    </x-card>

    <div wire:loading.delay>
        <x-wite />
    </div>

    <x-msg />
</div>
