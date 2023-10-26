<div class="flex w-full flex-wrap items-start gap-2 whitespace-break-spaces">

    <div class="relative grid grow gap-2">
        <label class="block">{{ __('me_str.key') }}</label>
        <input id="key" type="text" class="w-full rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark"
            placeholder="{{ __('convert.write_here') }}" autocomplete="off">
        <div class="grid" x-show="$store.syntax.isSyntaxKey">
            @component('components.syntaxes', ['iskey' => true, 'id' => 'key'])
            @endcomponent
        </div>
    </div>

    <div class="grid grow gap-2">
        <label class="block">{{ __('me_str.value') }}</label>
        <textarea rows="1" oninput="auto_grow(this)" id="value"
            class="w-full resize-none overscroll-none rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark"
            placeholder="{{ __('convert.write_here') }}"></textarea>
        <div class="grid" x-show="$store.syntax.isSyntaxValue">
            @component('components.syntaxes', ['iskey' => false, 'id' => 'value'])
            @endcomponent
        </div>
    </div>

    <script>
        function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight) + "px";
        }
    </script>
</div>
