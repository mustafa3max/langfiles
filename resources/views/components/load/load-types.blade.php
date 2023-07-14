<div>
    <div class="grid max-ss:grid-cols-1 max-sm:grid-cols-2 max-md:grid-cols-3 max-lg:grid-cols-4 grid-cols-5 gap-2"
        wire:loading.remove>
        @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0] as $type)
            <div
                class="bg-secondary-light dark:bg-secondary-dark text-center rounded-lg shadow-md flex flex-col animate-pulse">
                <div class="py-24">
                </div>
            </div>
        @endforeach
    </div>
</div>
