<div>
    <div class="flex flex-wrap gap-2">
        @php
            $classes = ['w-20', 'w-56', 'w-28', 'w-32', 'w-96', 'w-36', 'w-40', 'w-44', 'w-48', 'w-52', 'w-56', 'w-60', 'w-64', 'w-72', 'w-80', 'w-96', 'w-48', 'w-52', 'w-32', 'w-80'];
        @endphp
        @for ($i = 0; $i < count($classes); $i++)
            <div
                class="bg-secondary-light dark:bg-secondary-dark text-center rounded-lg shadow-md flex flex-col animate-pulse grow py-24 {{ $classes[$i] }} h-48">
            </div>
        @endfor
    </div>
</div>
