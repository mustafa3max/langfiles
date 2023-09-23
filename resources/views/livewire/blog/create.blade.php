<form wire:submit.prevent='create'>
    <x-card>
        <div class="grid gap-2 pb-2">
            <label>{{ __('me_str.file_name_en') }}</label>
            <input type="text" wire:model.blur='fileName'
                class="w-full rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark"
                placeholder="{{ __('me_str.file_name_en') }}">
            @error('title')
                {{ $message }}
            @enderror

            <label>{{ __('me_str.title') }}</label>
            <input type="text" wire:model.blur='title'
                class="w-full rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark"
                placeholder="{{ __('me_str.title') }}">
            @error('title')
                {{ $message }}
            @enderror

            <label>{{ __('me_str.desc') }}</label>
            <textarea rows="5" class="no-scrollbar w-full rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark"
                wire:model.blur='desc' placeholder="{{ __('me_str.desc') }}"></textarea>
            @error('desc')
                {{ $message }}
            @enderror

        </div>
        <div class="flex items-center gap-4">
            @component('components.raised-button', [
                'type' => 'submit',
                'value' => __('me_str.publish_now'),
                'icon' => 'paper-plane',
            ])
            @endcomponent
            <div wire:click='save'>
                @component('components.text-button', ['value' => __('me_str.save')])
                @endcomponent
            </div>
        </div>
    </x-card>

    <x-msg />
</form>
