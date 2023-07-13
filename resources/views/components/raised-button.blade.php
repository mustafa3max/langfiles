<button type="{{ $type ?? 'button' }}" onclick="{{ $onclick ?? '' }}" wire:click="{{ $click ?? '' }}"
    class="text-primary-dark bg-accent hover:bg-transparent dark:hover:bg-transparent border border-accent rounded-lg px-4 py-2 text-center">{{ $value }}
    <i class=""></i>
</button>
