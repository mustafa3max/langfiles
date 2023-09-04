<div>
    @section('page-title')
        {{ __('seo.title_contributors') }}
    @endsection
    @section('page-description')
        {{ __('seo.description_contributors') }}
    @endsection

    <div class="grid gap-2">
        <div class="grid gap-2">
            <x-card>
                <x-title value="{{ __('seo.title_contributors') }}" />
                <p class="text-center">{{ __('seo.description_contributors') }}</p>
            </x-card>
        </div>
        @foreach ($contributors as $contributor)
            @component('components.contributor', [
                'name' => $contributor['name'],
                'thumbnail' => $contributor['thumbnail'],
                'phone' => $contributor['phone'],
                'path_profile' => $contributor['path_profile'],
                'title' => $contributor['title'],
                'desc' => $contributor['desc'],
                'path_1' => $contributor['path_1'],
                'path_2' => $contributor['path_2'],
                'path_3' => $contributor['path_3'],
                'website' => $contributor['website'],
            ])
            @endcomponent
        @endforeach
    </div>
</div>
