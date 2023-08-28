<div>
    @section('page-title')
        {{ $article->title }}
    @endsection
    @section('page-description')
        {{ $article->desc }}
    @endsection

    <div class="grid items-center justify-center">
        <div dir="rtl">
            <h1 class="rounded-t-lg bg-primary-light py-3 text-3xl font-extrabold dark:bg-primary-dark">
                {!! $article->title !!}
            </h1>

            <x-editor.img src="{{ asset($article->thumbnail) }}" alt="{{ $article->title }}" />

            <div class="rounded-b-lg bg-primary-light dark:bg-primary-dark">
                {!! $article->article !!}
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-start gap-2 py-2">
            <div class="flex items-center gap-2 rounded-lg bg-secondary-light p-2 dark:bg-secondary-dark">
                <span>{{ __('me_str.author') }}</span>
                <a href="/mustafamax/profile">
                    @component('components.text-button', ['value' => $article->author])
                    @endcomponent
                </a>
            </div>
            {{-- <div class="flex gap-2 bg-primary-light dark:bg-primary-dark rounded-lg p-2 items-center">
                <span>{{ __('me_str.comments') }}</span>
                <i class="fa-solid fa-list"></i>
                @component('components.text-button', ['value' => 45])
                @endcomponent
            </div> --}}
        </div>
        @component('components.share-buttons', ['share' => $share])
        @endcomponent
    </div>

    <script>
        function selectText(containerid) {
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(containerid));
                range.select();
            } else if (window.getSelection) {
                var range = document.createRange();
                range.selectNode(document.getElementById(containerid));
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
            }
        }
    </script>
</div>
