@php
    $path = str_replace('_', '-', $article->path);
    $path = str_replace('.md', '', $path);
@endphp
<div class="rounded-lg border-2 border-primary-light dark:border-primary-dark" dir="rtl">
    <a href="/ar/blog/article/{{ $path }}" title="{{ __('me_str.read_more') }}" class="grid gap-2">
        <img class="block w-full rounded-t-lg" src="{{ asset($article->thumbnail) }}" alt="{{ $article->title }}" />
        <div class="grid gap-2 p-2">
            <h2 class="py-4 text-2xl font-extrabold">{{ $article->title }}</h2>
            <p class="">
                {{ $article->desc }}
                <span class="px-1"></span>

                <x-text-link href="{{ '/ar/blog/article/' . $path }}">{{ __('me_str.read_more') }}</x-text-link>

            </p>
        </div>
        <div class="flex flex-wrap items-center gap-2 rounded-b-lg bg-primary-light p-2 dark:bg-primary-dark">
            <div class="flex items-center gap-2">
                <span>{{ __('me_str.author') }}</span>
                <x-text-link href="{{ '/mustafamax/profile' . $path }}">{{ $article->users->name }}</x-text-link>
            </div>
            {{-- <span>|</span>
            <div class="flex items-center gap-2">
                <span>{{ __('me_str.comments') }}</span>
                <i class="fa-solid fa-list"></i>
                @component('components.text-button', ['value' => 45])
                @endcomponent
            </div> --}}
        </div>
    </a>
</div>
