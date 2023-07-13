<div>
    <input type="{{ $type }}" name="{{ $name }}"
        class="border border-primary-light dark:border-primary-dark rounded-lg block w-full dark:bg-secondary-dark p-2 text-lg"
        placeholder="{{ $placeholder }}" {{ $required }} {{ $disabled ?? '' }} wire:model="{{ $name }}">
    @error($name)
        <p class="text-sm text-accent text-center pt-3">{{ $message }}</p>
    @enderror
</div>
