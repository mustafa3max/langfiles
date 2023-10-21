<div :class="isFull ? 'h-full overflow-y-scroll pr-4 ' : ''">
    <div class="grid h-screen w-full items-center justify-center p-8 text-center"
        x-show="!Alpine.store('langtool').isDir">
        <div class="flex w-full justify-center">
            <img src="{{ asset('assets/images/empty.svg') }}" alt="{{ __('me_str.no_data') }}" class="block w-fit pb-4">
        </div>
        <h2 class="p-4 text-2xl font-semibold">{{ __('tools.title_not_select_dir') }}</h2>
        <p class="text-lg">{{ __('tools.desc_not_select_dir') }}</p>
        <div class="pt-8">
            <x-tools.select-dir-btn />
        </div>
    </div>
</div>
