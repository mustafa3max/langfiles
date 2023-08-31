 <a href="{{ route('convert-to', ['type1' => $type1, 'type2' => $type2]) }}" title="{{ $title ?? '' }}"
     class="grow rounded-lg bg-secondary-light px-4 py-2 text-center hover:text-accent dark:bg-secondary-dark">{{ $slot }}</a>
