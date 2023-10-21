<ul class="grid gap-2 rounded-lg">
    <div class="flex w-full" dir="ltr">
        <div class="grow text-center">{{ __('me_str.key') }}</div>
        <div class="grow text-center">{{ __('me_str.value') }}</div>
    </div>
    <div class="flex w-full gap-2" dir="ltr">
        <input id="key" type="text" placeholder="{{ __('me_str.key') }}"
            class="block h-fit w-full grow rounded-lg bg-secondary-light p-2 outline-accent focus:outline dark:bg-secondary-dark">
        <div id="value" type="text" contenteditable="true"
            :dir="Alpine.store('langtool').lang == 'ar' ? 'rtl' : 'ltr'" data-placeholder="{{ __('me_str.value') }}"
            class="block w-full grow rounded-lg bg-secondary-light p-2 outline-accent focus:outline dark:bg-secondary-dark">
        </div>
    </div>
</ul>
