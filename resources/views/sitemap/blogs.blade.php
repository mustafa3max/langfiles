<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @php
        $lang = 'ar';
        if (str_contains(request()->route()->uri, 'en/')) {
            $lang = 'en';
        }
    @endphp
    @foreach ($blogs as $blog)
        @php
            $route = $blog->path;
            $route = str_replace('_', '-', $route);
            $route = str_replace('.md', '', $route);
        @endphp
        <url>
            <loc>{{ url('/') . '/' . $lang . '/blog/article/' . $route }}/</loc>
            <lastmod>{{ $blog->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
        </url>
    @endforeach
</urlset>
