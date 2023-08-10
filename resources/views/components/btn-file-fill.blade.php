<button class="h-12 w-12 rounded-lg bg-accent text-primary-light hover:bg-transparent"
    :title="isGroup ? '{{ $text[1] }}' : '{{ $text[0] }}'">
    <i class="fa-solid" :class="isGroup ? 'fa-{{ $icon[1] }}' : 'fa-{{ $icon[0] }}'"></i>
</button>
