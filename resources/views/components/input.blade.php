<div>
    <input type="{{ $type }}" class="block w-full rounded-lg bg-primary-light p-4 text-lg dark:bg-primary-dark"
        placeholder="{{ $placeholder }}" {{ $required }} {{ $disabled ?? '' }} wire:model="{{ $name }}"
        id="{{ $name }}">
    @error($name)
        <p class="pt-3 text-center text-sm text-accent">{{ $message }}</p>
    @enderror
</div>
