<div>
    <div class="flex flex-wrap gap-2 pt-2">
        @for ($i = 0; $i < 20; $i++)
            <div
                class="bg-primary-light dark:bg-primary-dark text-center rounded-lg shadow-md flex flex-col animate-pulse grow h-[180px]">
                <span before="{{ Str::random(random_int(6, 16)) }}"
                    class="p-2 before:content-[attr(before)] text-transparent"></span>
            </div>
        @endfor
    </div>
</div>
