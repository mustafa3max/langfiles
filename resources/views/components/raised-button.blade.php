<button type="{{ $type ?? 'button' }}"
    class="text-primary-dark bg-accent hover:bg-transparent dark:hover:bg-transparent border border-accent hover:text-accent rounded-lg px-4 py-2 text-center">
    <i class="fa-solid fa-{{ $icon . ' pe-2' ?? '' }}"></i>

    {{ $value }}
</button>
