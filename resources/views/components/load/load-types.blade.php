<div>
    <div class="flex flex-wrap gap-2">
        @for ($i = 0; $i < 20; $i++)
            <div
                class="flex h-[180px] grow animate-pulse flex-col rounded-lg bg-secondary-light text-center shadow-md dark:bg-primary-dark">
                <span before="{{ Str::random(random_int(6, 16)) }}"
                    class="p-2 text-transparent before:content-[attr(before)]"></span>
            </div>
        @endfor
    </div>
</div>
