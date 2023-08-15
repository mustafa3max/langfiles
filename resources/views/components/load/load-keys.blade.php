<div>
    <div class="flex flex-wrap gap-2">
        @for ($i = 0; $i < 20; $i++)
            <div
                class="flex h-[80px] grow animate-pulse flex-col rounded-lg bg-primary-light text-center shadow-md dark:bg-primary-dark">
                <span before="{{ Str::random(random_int(8, 32)) }}"
                    class="p-2 text-transparent before:content-[attr(before)]"></span>
            </div>
        @endfor
    </div>
</div>
