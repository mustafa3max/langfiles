<div>
    @section('page-title')
        {{ __('seo.title_tools') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_tools') }}
    @endsection

    <x-card>
        <x-title value="{{ __('tools.title_tools') }}" />
        <p class="text-lg">{{ __('tools.desc_1') }}</p>

        <div class="py-2">
            <img class="rounded-lg border-4 border-primary-light dark:border-primary-dark"
                src="{{ asset('assets/images/langfiles_tools_home.png') }}" alt="{{ __(__('tools.title_tools')) }}">
        </div>

        <h2 class="py-4 text-2xl font-bold">{{ __('tools.title_1') }}</h2>
        <p class="text-lg">{{ __('tools.desc_2') }}</p>

        <h2 class="py-4 text-2xl font-bold">{{ __('tools.title_2') }}</h2>
        <p class="text-lg">{{ __('tools.desc_3') }}</p>

        <h2 class="py-4 text-2xl font-bold">{{ __('tools.title_info_about_program') }}</h2>
        <p class="text-lg">{{ __('tools.desc_info_about_program') }}</p>
        <ul class="list-decimal p-4">
            <li>{{ __('tools.system_type', ['SYSTEM' => 'Linux']) }}</li>
            <li>{{ __('tools.system_architecture', ['TYPE' => '64 bit']) }}</li>
            <li>{{ __('tools.version', ['VERSION' => '1.0.0']) }}</li>
        </ul>

        <h2 class="py-4 text-2xl font-bold">{{ __('tools.pros_and_cons') }}</h2>
        <p class="text-lg">{{ __('tools.desc_pros_and_cons') }}</p>

        <h3 class="py-4 text-xl font-bold">{{ __('tools.pros') }}</h3>
        <ul class="list-decimal p-4">
            <li>{{ __('tools.pros_1') }}</li>
            <li>{{ __('tools.pros_2') }}</li>
            <li>{{ __('tools.pros_3') }}</li>
        </ul>

        <h3 class="py-4 text-xl font-bold">{{ __('tools.cons') }}</h3>
        <ul class="list-decimal p-4">
            <li>{{ __('tools.cons_1') }}</li>
        </ul>

        <h2 class="py-4 text-2xl font-bold">{{ __('tools.download') }}</h2>
        <p class="text-lg">{{ __('tools.desc_download') }}</p>
        <ul class="list-decimal p-4">
            <li>{{ __('tools.download_for_linux') }} <button wire:click='download'
                    class="font-bold text-accent hover:underline">Langfiles
                    Tools</button></li>
        </ul>

        <span class="block py-4 text-code-2-light dark:text-code-2-dark">{{ __('tools.important_note') }}</span>
    </x-card>
</div>
