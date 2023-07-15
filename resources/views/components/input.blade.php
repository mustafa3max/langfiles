<div>
    <input type="{{ $type }}" class="bg-primary-light dark:bg-primary-dark rounded-lg block w-full p-4 text-lg"
        placeholder="{{ $placeholder }}" {{ $required }} {{ $disabled ?? '' }} wire:model="{{ $name }}">
    @error($name)
        <p class="text-sm text-accent text-center pt-3">{{ $message }}</p>
    @enderror
</div>
