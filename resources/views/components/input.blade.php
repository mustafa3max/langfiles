<div>
    <input type="{{ $type }}"
        class="block w-full rounded-lg bg-primary-light p-4 text-lg outline-0 autofill:shadow-[inset_0_0_0px_1000px_rgb(200,200,200)] dark:bg-primary-dark autofill:dark:shadow-[inset_0_0_0px_1000px_rgb(30,30,30)]"
        placeholder="{{ $placeholder }}" {{ $required }} {{ $disabled ?? '' }} wire:model.defer="{{ $name }}"
        id="{{ $name }}">
    @error($name)
        <p class="pt-3 text-center text-sm text-accent">{{ $message }}</p>
    @enderror
</div>
