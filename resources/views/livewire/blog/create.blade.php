<form wire:submit.prevent='create'>
    <x-card>
        <div class="grid gap-2 pb-2">
            <label>{{ __('me_str.file_name_en') }}</label>

            <x-input name="fileName" placeholder="{{ __('me_str.file_name_en') }}"></x-input>

            <label>{{ __('me_str.title') }}</label>

            <x-input name="title" placeholder="{{ __('me_str.title') }}"></x-input>

            <label>{{ __('me_str.desc') }}</label>
            <textarea rows="5" class="no-scrollbar w-full rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark"
                wire:model.blur='desc' placeholder="{{ __('me_str.desc') }}"></textarea>
            @error('desc')
                {{ $message }}
            @enderror

        </div>
        <div class="flex items-center justify-between gap-4">

            <x-fill-btn type="submit">{{ __('me_str.publish_now') }}</x-fill-btn>

            <div wire:click='save'>
                <x-text-link>{{ __('me_str.save') }}</x-text-link>
            </div>
        </div>
    </x-card>

    <x-msg />
</form>
