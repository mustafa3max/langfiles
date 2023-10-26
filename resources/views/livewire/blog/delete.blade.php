<div>
    @section('page-index')
        noindex
    @endsection

    @section('page-title')
        {{ __('seo.title_articles') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_articles') }}
    @endsection

    <x-card>
        <div class="grid gap-2">
            @forelse ($articles as $article)
                <div class="grid gap-2">
                    {{-- Article --}}
                    <div class="rounded-lg border-2 border-primary-light dark:border-primary-dark" dir="rtl">

                        <img class="block w-full rounded-t-lg" src="{{ asset($article->thumbnail) }}"
                            alt="{{ $article->title }}" />
                        <div class="grid gap-2 p-2">
                            <h2 class="py-4 text-2xl font-extrabold">{{ $article->title }}</h2>
                            <p class="">
                                {{ $article->desc }}
                                <span class="px-1"></span>
                            </p>
                        </div>
                        <div
                            class="flex flex-wrap items-center gap-2 rounded-b-lg bg-primary-light p-2 dark:bg-primary-dark">
                            <div class="flex items-center gap-2">
                                <span>{{ __('me_str.author') }}</span>
                                <x-text-link href="/mustafamax/profile">
                                    @component('components.text-button', ['value' => $article->users->name])
                                    @endcomponent
                                </x-text-link>
                            </div>
                        </div>
                    </div>

                    {{-- Delete Article --}}
                    <div class="grid gap-2">
                        <label>{{ __('me_str.enter_article_title_before_deletion') }}</label>

                        <x-input name="title"
                            placeholder="{{ __('me_str.enter_article_title_before_deletion') }}"></x-input>

                        <button wire:click='delete({{ $article->id }})'
                            class="w-full rounded-lg bg-accent p-2 font-extrabold">{{ __('me_str.delete') }}</button>
                    </div>
                </div>
            @empty
                @component('components.empty', ['isReload' => false])
                @endcomponent
            @endforelse
        </div>
    </x-card>
</div>
