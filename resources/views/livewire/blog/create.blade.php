<form wire:submit.prevent='create'>
    <x-card>
        <div class="grid gap-2 pb-2">
            <input type="text" wire:model.lazy='title'
                class="w-full rounded-lg bg-primary-light p-4 dark:bg-primary-dark" placeholder="{{ __('me_str.title') }}"
                disabled>
            @error('title')
                {{ $message }}
            @enderror
            <textarea rows="5" class="no-scrollbar w-full rounded-lg bg-primary-light p-4 dark:bg-primary-dark"
                wire:model.lazy='desc' placeholder="{{ __('me_str.desc') }}" disabled></textarea>
            @error('desc')
                {{ $message }}
            @enderror
            <textarea rows="20" class="no-scrollbar w-full rounded-lg bg-primary-light p-4 dark:bg-primary-dark"
                wire:model.lazy='article' placeholder="{{ __('me_str.article') }}" disabled></textarea>
            @error('article')
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
</form>
