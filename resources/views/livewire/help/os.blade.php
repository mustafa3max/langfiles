<div>
    <div class="fixed left-0 right-0 top-0 z-50">
        <div
            class="flex flex-wrap items-center justify-center gap-8 border-b-4 border-accent bg-secondary-light p-8 dark:bg-secondary-dark">
            <button title="{{ __('me_str.close') }}" class="text-accent" wire:click='okOrClose(0)'><x-svg.x /></button>
            <div class="grow"></div>

            <span>{{ __('me_str.msg_os_android') }}</span>
            <button class="flex gap-2 rounded-lg bg-accent p-2 font-extrabold"
                wire:click='okOrClose(1)'>{{ __('me_str.go_app') }}
                <x-svg.android />
            </button>
            <div class="grow"></div>
            <div x-text="navigator.userAgent.indexOf("Android")"></div>
        </div>
    </div>
</div>
