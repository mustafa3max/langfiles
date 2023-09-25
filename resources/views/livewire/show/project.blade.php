<div>
    @section('page-title')
        {{ __('seo.title_project') }}
    @endsection
    @section('page-description')
        {{ __('seo.description_project') }}
    @endsection

    <x-types-keys route="{{ $route }}">

        <div class="grid gap-2">
            <x-title value="{{ __('seo.title_project') }}" />
            <p class="text-center">{{ __('seo.description_project') }}</p>

            <form class="flex flex-wrap gap-2" wire:submit>
                @foreach ($sessions as $session)
                    <label
                        class="flex items-center justify-center gap-2 rounded-full bg-primary-light p-4 font-extrabold dark:bg-primary-dark"
                        for="{{ $session }}">{{ __('sections.' . $session) }}
                        <input type="checkbox" id="{{ $session }}"
                            wire:model.live='isSessionsQuery.{{ $loop->index }}'>
                    </label>
                @endforeach
            </form>

            <x-convert-to isEdit="0" />

            <x-card-dark>
                <div class="relative" dir="ltr" x-show="!isAr">
                    @if (count($newData) > 0)
                        <div class="absolute end-0 flex gap-2 p-4">
                            <x-copy-code i="code-1" />
                        </div>
                        <div id="code-1" class="p-4 text-lg font-semibold" wire:key="{{ rand() }}">
                            <div class="no-scrollbar w-full overflow-auto whitespace-nowrap">
                                <div x-data="{ data: '{{ $json[0] }}' }" x-show="convert[0]" x-html="data"></div>
                                <div x-data="{ data: '{{ $php[0] }}' }" x-show="convert[1]" x-html="data"></div>
                                <div x-data="{ data: '{{ $android[0] }}' }" x-show="convert[2]" x-html="data" class="flex-shrink-0">
                                </div>
                                <div x-data="{ data: '{{ $ios[0] }}' }" x-show="convert[3]" x-html="data"></div>
                                <div x-data="{ data: '{{ $django[0] }}' }" x-show="convert[4]" x-html="data"></div>
                                <div x-data="{ data: '{{ $xlf[0] }}' }" x-show="convert[5]" x-html="data"></div>
                                <div x-data="{ data: '{{ $csv[0] }}' }" x-show="convert[6]" x-html="data"></div>
                            </div>
                        </div>
                    @endif
                </div>
            </x-card-dark>
        </div>
    </x-types-keys>
    <div wire:loading>
        <x-wite />
    </div>
</div>
