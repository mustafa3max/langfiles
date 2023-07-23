<div class="flex flex-wrap gap-2">

    @php
        $classes = ['w-20', 'w-56', 'w-28', 'w-32', 'w-96', 'w-36', 'w-40', 'w-44', 'w-48', 'w-52', 'w-56', 'w-60', 'w-64', 'w-72', 'w-80', 'w-96', 'w-48', 'w-52', 'w-32', 'w-80'];
    @endphp

    @for ($i = 0; $i < count($classes); $i++)
        <div class="grid md:flex gap-2 bg-primary-light dark:bg-primary-dark rounded-lg p-2 grow h-16 animate-pulse  {{ $classes[$i] }}"
            dir="ltr">
        </div>
    @endfor
</div>
