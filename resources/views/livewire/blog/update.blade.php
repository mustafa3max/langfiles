<form wire:submit.prevent='update'>
    <x-card>
        <div class="pb-2 grid gap-2">
            <input type="text" wire:model.lazy='title'
                class="bg-primary-light dark:bg-primary-dark rounded-lg p-4 w-full"
                placeholder="{{ __('me_str.title') }}">
            @error('title')
                {{ $message }}
            @enderror
            <textarea rows="10" class="bg-primary-light dark:bg-primary-dark rounded-lg p-4 w-full no-scrollbar"
                wire:model.lazy='article' placeholder="{{ __('me_str.article') }}"></textarea>
            @error('article')
                {{ $message }}
            @enderror
        </div>
        <div class="flex gap-4 items-center">
            @component('components.raised-button', ['type' => 'submit', 'value' => __('me_str.update_now')])
            @endcomponent
        </div>
    </x-card>
</form>
