<div class="flex flex-wrap items-end gap-4">

    <div class="relative grid grow gap-2">
        <label class="block">{{ __('me_str.key') }}</label>
        <input id="key" type="text" class="w-full rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark"
            placeholder="{{ __('convert.write_here') }}" autocomplete="off">
        <div class="absolute top-[90px] z-50 w-full" x-show="$store.syntax.isSyntaxKey">
            @component('components.syntaxes', ['iskey' => true, 'id' => 'key'])
            @endcomponent
        </div>
    </div>

    <button onclick="add()" class="mb-1 flex h-12 w-12 items-center justify-center rounded-full bg-accent"
        title="{{ __('convert.add') }}"><x-svg.add /></button>

    <div class="relative grid grow gap-2">
        <label class="block">{{ __('me_str.value') }}</label>
        <input id="value" type="text"
            class="w-full rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark"
            placeholder="{{ __('convert.write_here') }}" autocomplete="off">
        <div class="absolute top-[90px] z-50 w-full" x-show="$store.syntax.isSyntaxValue">
            @component('components.syntaxes', ['iskey' => false, 'id' => 'value'])
            @endcomponent
        </div>
    </div>

</div>
