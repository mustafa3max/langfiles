<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center pt-2 gap-2">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-primary-dark dark:text-primary-light opacity-40 bg-white border dark:border-secondary-dark border-secondary-light cursor-default rounded-md">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-primary-dark dark:text-primary-light bg-white border dark:border-secondary-dark border-secondary-light rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-primary-dark transition ease-in-out duration-150 hover:bg-accent dark:hover:bg-accent bg-secondary-light dark:bg-secondary-dark">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-primary-dark dark:text-primary-light bg-white border dark:border-secondary-dark border-secondary-light rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-primary-dark transition ease-in-out duration-150 hover:bg-accent dark:hover:bg-accent bg-secondary-light dark:bg-secondary-dark">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-primary-dark dark:text-primary-light opacity-40 bg-white border dark:border-secondary-dark border-secondary-light cursor-default rounded-md">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>
