<div class="">
    <h3 class="rounded-t-lg bg-secondary-light p-4 text-center text-xl font-bold dark:bg-secondary-dark">
        {{ __('me_str.latest_articles') }}
    </h3>
    <ul class="rounded-b-lg border-8 border-secondary-light px-3 dark:border-secondary-dark">

        @foreach ($latestArticles as $article)
            @php
                $route = str_replace('_', '-', $article->path);
                $route = str_replace('.md', '', $route);
            @endphp

            <li
                class="{{ $loop->last ? '' : 'border-b-2' }} flex border-secondary-light py-3 hover:rounded-lg hover:text-accent dark:border-secondary-dark">
                <x-text-link href="{{ '/ar/blog/article/' . $route }}" isNavigate="1"
                    accent="0">{{ $article->title }}</x-text-link>
            </li>
        @endforeach
    </ul>
</div>
