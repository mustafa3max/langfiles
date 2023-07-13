<button type="{{ $type ?? 'button' }}" onclick="{{ $onclick ?? '' }}" wire:click="{{ $click ?? '' }}"
    class="text-accent hover:underline cursor-pointer">
    {{ $value }}
</button>
