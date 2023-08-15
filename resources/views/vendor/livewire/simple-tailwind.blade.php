<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center gap-2 pt-2">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span
                        class="relative inline-flex cursor-default items-center rounded-md border border-primary-light px-4 py-2 text-sm font-medium text-primary-dark dark:border-primary-dark dark:text-primary-light">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                        class="hover:text-gray-500 focus:shadow-outline-blue focus:border-blue-300 relative inline-flex items-center rounded-md border border-primary-light bg-primary-light px-4 py-2 text-sm font-medium text-primary-dark transition duration-150 ease-in-out hover:bg-accent focus:outline-none active:text-primary-dark dark:border-primary-dark dark:bg-primary-dark dark:text-primary-light dark:hover:bg-accent">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>

            <span
                class="relative inline-flex cursor-default items-center rounded-md border border-primary-light px-4 py-2 text-sm font-medium text-primary-dark opacity-80 dark:border-primary-dark dark:text-primary-light">
                <span class="font-bold">{{ $currentPage }}</span>
                <i class="px-4 font-bold">/</i>
                <span class="font-bold">{{ $lastPage }}</span>
            </span>
            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                        class="hover:text-gray-500 focus:shadow-outline-blue focus:border-blue-300 relative inline-flex items-center rounded-md border border-primary-light bg-primary-light px-4 py-2 text-sm font-medium text-primary-dark transition duration-150 ease-in-out hover:bg-accent focus:outline-none active:text-primary-dark dark:border-primary-dark dark:bg-primary-dark dark:text-primary-light dark:hover:bg-accent">
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
