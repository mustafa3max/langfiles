<form wire:submit.prevent='update'>
    <style>
        ol {
            background: #000;
        }
    </style>
    <x-card>
        <div class="grid gap-2 pb-2">
            <x-input name="title" placeholder="{{ __('me_str.title') }}"></x-input>

            <x-input name="image" placeholder="{{ __('me_str.image') }}"></x-input>

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
        <x-fill-btn type="submit">{{ __('me_str.update_now') }}</x-fill-btn>
    </div>
</form>
