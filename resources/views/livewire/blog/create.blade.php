<form wire:submit.prevent='create'>
    <x-card>
        <div class="pb-2 grid gap-2">
            <input type="text" wire:model.lazy='title'
                class="bg-primary-light dark:bg-primary-dark rounded-lg p-4 w-full"
                placeholder="{{ __('me_str.title') }}">
            @error('title')
                {{ $message }}
            @enderror
            <textarea rows="5" class="bg-primary-light dark:bg-primary-dark rounded-lg p-4 w-full no-scrollbar"
                wire:model.lazy='desc' placeholder="{{ __('me_str.desc') }}"></textarea>
            @error('desc')
                {{ $message }}
            @enderror
            <textarea rows="20" class="bg-primary-light dark:bg-primary-dark rounded-lg p-4 w-full no-scrollbar"
                wire:model.lazy='article' placeholder="{{ __('me_str.article') }}"></textarea>
            @error('article')
                {{ $message }}
            @enderror
        </div>
        <div class="flex gap-4 items-center">
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
</form>
