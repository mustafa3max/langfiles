<div>
    <div class="flex flex-wrap gap-4">
        <a href="/types"
            class="{{ $route == 'types' ? 'font-bold' : 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark' }} block grow rounded-t-lg bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark"
            wire:navigate>
            {{ __('me_str.by_type') }}
        </a>
        {{-- <a href="/project"
            class="{{ $route == 'project' ? 'font-bold' : 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark' }} block grow rounded-t-lg bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark" wire:navigate>
            {{ __('me_str.by_project') }}
        </a> --}}
        <a href="/projects"
            class="{{ $route == 'projects' ? 'font-bold' : 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark' }} block grow rounded-t-lg bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark"
            wire:navigate>
            {{ __('me_str.by_project') }}
        </a>
    </div>
    <div class="rounded-b-lg bg-secondary-light p-2 dark:bg-secondary-dark">
        {{ $slot }}
    </div>
</div>
