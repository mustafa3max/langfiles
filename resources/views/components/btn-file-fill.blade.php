<button
    class="flex h-12 min-w-[3rem] items-center justify-center rounded-lg bg-accent text-primary-light hover:bg-transparent hover:text-accent"
    :title="isGroup ? '{{ $text[1] }}' : '{{ $text[0] }}'">
    <i class="fa-solid" :class="isGroup ? 'fa-{{ $icon[1] }}' : 'fa-{{ $icon[0] }}'"></i>
</button>
