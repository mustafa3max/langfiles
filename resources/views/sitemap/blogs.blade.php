<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($blogs as $blog)
        @php
            $route = $blog->path;
            $route = str_replace('_', '-', $route);
            $route = str_replace('.md', '', $route);
        @endphp
        <url>
            <loc>{{ url('/') . '/blog/article/' . $route }}/</loc>
            <lastmod>{{ $blog->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
        </url>
    @endforeach
</urlset>
