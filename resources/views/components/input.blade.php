<div>
    <input type="{{ $type ?? 'text' }}"
        class="block w-full rounded-lg bg-primary-light p-4 text-lg outline-0 autofill:shadow-[inset_0_0_0px_1000px_rgb(200,200,200)] dark:bg-primary-dark autofill:dark:shadow-[inset_0_0_0px_1000px_rgb(30,30,30)]"
        placeholder="{{ $placeholder }}" required="{{ $required ?? true }}" {{ $disabled ?? false }}
        wire:model="{{ $name }}" id="{{ $name }}"
        @if ($isDir ?? false) webkitdirectory directory multiple @endif>
    @error($name)
        <p class="pt-3 text-center">
            <span class="text-lg font-extrabold text-code-2-light dark:text-code-2-dark">{{ __('error.error') }}:</span>
            <span class="font-bold">{{ $message }}</span>
        </p>
    @enderror
</div>
