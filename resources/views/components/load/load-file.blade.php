<div class="flex flex-wrap gap-4">
    @php
        $classes = ['min-w-[100px]', 'min-w-[150px]', 'min-w-[125px]', 'min-w-[150px]', 'min-w-[75px]', 'min-w-[150px]', 'min-w-[125px]', 'min-w-[100px]', 'min-w-[75px]', 'min-w-[150px]'];
    @endphp

    @for ($i = 0; $i < count($classes); $i++)
        <div class="bg-secondary-light dark:bg-secondary-dark rounded-lg grow h-14 animate-pulse {{ $classes[$i] }}">
        </div>
    @endfor
</div>
