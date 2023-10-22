<div>
    @section('page-title')
        {{ __('seo.title_tools') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_tools') }}
    @endsection

    @section('social-image')
        {{ asset('assets/images/langfiles_tools_home.png') }}
    @endsection

    <x-card>
        <x-title>{{ __('tools.title_tools') }}</x-title>
        <x-desc>{{ __('tools.desc_1') }}</x-desc>

        <div class="grid gap-2">
            {{-- Langtool Flutter --}}
            <x-card-dark>
                <h2 class="text-center text-2xl font-semibold">{{ __('seo.title_langtool_flutter') }}</h2>
                <x-desc>{{ __('tools.desc_langtool_flutter') }}</x-desc>
                <a href="{{ route('langtool-flutter') }}" class="flex justify-center">
                    <x-fill-btn>Lnagtool Flutter</x-fill-btn>
                </a>
            </x-card-dark>

            {{-- Langtool Laravel --}}
            <x-card-dark>
                <h2 class="text-center text-2xl font-semibold">{{ __('seo.title_langtool_laravel') }}</h2>
                <x-desc>{{ __('tools.desc_langtool_laravel') }}</x-desc>
                <a href="{{ route('langtool-laravel') }}" class="flex justify-center">
                    <x-fill-btn>Lnagtool Laravel</x-fill-btn>
                </a>
            </x-card-dark>
        </div>
    </x-card>

</div>
