<div>
    @section('page-title')
        {{ __('seo.title_call_us') }}
    @endsection
    @section('page-description')
        {{ __('seo.description_call_us') }}
    @endsection

    <x-card>
        <x-title value="{{ __('me_str.call_us') }}" />
        <p class="pb-4">{{ __('seo.description_call_us') }}</p>

        <form wire:submit="sendMessage">
            <div>
                <label class="block py-2">{{ __('me_str.email') }}</label>
                <x-input type="text" placeholder="{{ __('me_str.email') }}" required="1" name="email" />
            </div>
            <div>
                <label class="block py-2">{{ __('me_str.title') }}</label>
                <x-input type="text" placeholder="{{ __('me_str.title') }}" required="1" name="title" />
            </div>
            <div>
                <label class="block py-2">{{ __('me_str.your_message') }}</label>
                <textarea class="w-full rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark" rows="6"
                    placeholder="{{ __('me_str.your_message') }}" required wire:model="message"></textarea>
            </div>

            @component('components.raised-button', ['icon' => '', 'type' => 'submit', 'value' => __('me_str.send_message')])
            @endcomponent
        </form>
    </x-card>

    <div wire:loading>
        <x-wite />
    </div>

    <x-msg />
</div>
