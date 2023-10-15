<div class="w-full pb-2" id="ad-box">
    <div class="flex flex-wrap gap-2">
        <x-link route="{{ route('convert-to') }}"
            title="{{ implode(' ' . __('me_str.or') . ' ', Globals::supportedExtensions()) }}">{{ __('convert.json_to_dart') }}</x-link>
        <x-link route="{{ route('add-text') }}">{{ __('me_str.add_texts') }}</x-link>
        <x-link route="{{ route('langfiles-tolls') }}">{{ __('tools.tools') }}</x-link>
        <x-link route="{{ route('contributors') }}" isContributors="1">{{ __('contributors.contributors') }}</x-link>
    </div>
</div>
