<div>
    @section('page-title')
        {{ $blog->title }}
    @endsection

    @section('page-description')
        {{ $blog->desc }}
    @endsection

    @section('social-image')
        {{ asset($blog->thumbnail) }}
    @endsection

    <style>
        pre {
            direction: ltr
        }
    </style>
    <x-card>
        <div class="grid grid-cols-1 items-start gap-2">
            <div class="grid grid-cols-1 gap-2">
                <x-title>{{ $blog->title }}</x-title>
                <img class="block min-h-[200px] w-full rounded-lg border border-primary-light dark:border-primary-dark"
                    src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->title }}" />
                <x-article>
                    {!! $article !!}
                </x-article>
            </div>
            <div
                class="flex flex-wrap items-center justify-start gap-2 rounded-lg bg-primary-light p-2 py-2 dark:bg-primary-dark">
                <div class="flex items-center gap-2">
                    <span>{{ __('me_str.author') }}</span>
                    <x-text-link href="/mustafamax/profile">
                        {{ $author }}
                    </x-text-link>
                </div>
                <div class="grow"></div>
                {{-- @if ($blog->author === Auth::id())
                    <a href="{{ route('editor', ['path' => $blog->path]) }}"
                        class="text-accent hover:underline">{{ __('me_str.edit') }}</a>
                @endif --}}
            </div>
            @component('components.share-buttons', ['share' => $share])
            @endcomponent
        </div>
    </x-card>
    <script>
        // function selectText(containerid) {
        //     if (document.selection) {
        //         var range = document.body.createTextRange();
        //         range.moveToElementText(document.getElementById(containerid));
        //         range.select();
        //     } else if (window.getSelection) {
        //         var range = document.createRange();
        //         range.selectNode(document.getElementById(containerid));
        //         window.getSelection().removeAllRanges();
        //         window.getSelection().addRange(range);
        //     }
        // }
    </script>

    @push('scripts-schema')
        <script type="application/ld+json">
            {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "headline": "{!!$blog->title!!}",
            "image": [
                "{!!asset($blog->thumbnail)!!}"
            ],
            "datePublished": "{!!$blog->created_at!!}",
            "dateModified": "{!!$blog->updated_at!!}",
            "author": [{
                "@type": "Person",
                "name": "{!!$author!!}",
                "url": "{!!url('/')!!}"
                }]
            }
        </script>
    @endpush
</div>
