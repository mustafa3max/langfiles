<div>
    @if ($count > 0)
        <nav class="flex justify-center gap-2 pt-2">
            <span>
                {{-- Previous Page Link --}}
                @if ($offset <= 0)
                    <span
                        class="relative inline-flex cursor-default items-center rounded-md border border-primary-light px-4 py-2 text-sm font-medium text-primary-dark dark:border-primary-dark dark:text-primary-light">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button wire:click="previousPage"
                        class="focus:shadow-outline-blue focus:border-blue-300 relative inline-flex items-center rounded-md border border-primary-light bg-primary-light px-4 py-2 text-sm font-medium text-primary-dark transition duration-150 ease-in-out hover:bg-accent hover:text-secondary-dark focus:outline-none active:text-primary-dark dark:border-secondary-dark dark:bg-primary-dark dark:text-primary-light dark:hover:bg-accent hover:dark:text-secondary-dark">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>

            <span
                class="relative inline-flex cursor-default items-center rounded-md border border-primary-light px-4 py-2 text-sm font-medium text-primary-dark opacity-80 dark:border-primary-dark dark:text-primary-light">
                <span class="flex items-center">{{ $slot }}</span>
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($offset >= 0)
                    <button wire:click="nextPage" rel="next"
                        class="focus:shadow-outline-blue focus:border-blue-300 relative inline-flex items-center rounded-md border border-secondary-light bg-primary-light px-4 py-2 text-sm font-medium text-primary-dark transition duration-150 ease-in-out hover:bg-accent hover:text-secondary-dark focus:outline-none active:text-primary-dark dark:border-secondary-dark dark:bg-primary-dark dark:text-primary-light dark:hover:bg-accent hover:dark:text-secondary-dark">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span
                        class="relative inline-flex cursor-default items-center rounded-md border border-primary-light px-4 py-2 text-sm font-medium text-primary-dark dark:border-primary-dark dark:text-primary-light">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>
