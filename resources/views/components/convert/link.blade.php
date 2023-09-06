 <a @if ($route != url()->full()) href="{{ $route }}" @endif title="{{ $title ?? '' }}"
     class="{{ $route == url()->full() ? 'border-secondary-light dark:border-secondary-dark' : 'bg-secondary-light border-transparent dark:bg-secondary-dark hover:text-accent' }} grow rounded-lg border px-4 py-2 text-center">{{ $slot }}
 </a>
