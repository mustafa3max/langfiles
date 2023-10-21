<button type="{{ $type ?? 'button' }}"
    class="flex items-center justify-center gap-2 rounded-lg border-2 border-accent bg-accent px-4 py-2 text-center font-extrabold text-primary-dark hover:bg-transparent hover:text-accent dark:hover:bg-transparent">
    {{ $slot }}
</button>
