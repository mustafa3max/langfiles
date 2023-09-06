<form wire:submit.prevent='update'>
    <style>
        ol {
            background: #000;
        }
    </style>
    <x-card>
        <div class="grid gap-2 pb-2">
            <input type="text" wire:model.blur='title'
                class="w-full rounded-lg bg-primary-light p-4 dark:bg-primary-dark"
                placeholder="{{ __('me_str.title') }}">
            @error('title')
                {{ $message }}
            @enderror
            <input type="text" wire:model.blur='image'
                class="w-full rounded-lg bg-primary-light p-4 dark:bg-primary-dark"
                placeholder="{{ __('me_str.image') }}">
            @error('image')
                {{ $message }}
            @enderror
            <textarea rows="5" class="no-scrollbar w-full rounded-lg bg-primary-light p-4 dark:bg-primary-dark"
                wire:model.blur='desc' placeholder="{{ __('me_str.desc') }}"></textarea>
            @error('desc')
                {{ $message }}
            @enderror
            <textarea rows="20" class="no-scrollbar w-full rounded-lg bg-primary-light p-4 dark:bg-primary-dark"
                wire:model.blur='article' placeholder="{{ __('me_str.article') }}"></textarea>
            @error('article')
                {{ $message }}
            @enderror
        </div>
    </x-card>
    <div class="p-1"></div>
    <x-card>
        <h1 class="rounded-t-lg bg-primary-light p-4 dark:bg-primary-dark">{{ $title }}</h1>
        {!! $articleQuery !!}
    </x-card>
    <div class="p-1"></div>
    <div class="flex items-center gap-4">
        @component('components.raised-button', ['type' => 'submit', 'value' => __('me_str.update_now'), 'icon' => 'pen'])
        @endcomponent
    </div>
</form>
