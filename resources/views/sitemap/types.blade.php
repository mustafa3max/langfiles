<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @php
        $lang = 'ar';
        if (str_contains(request()->route()->uri, 'en/')) {
            $lang = 'en';
        }
    @endphp
    @foreach ($types as $type)
        @php
            $route = str_replace(LaravelLocalization::getCurrentLocale() . '_', 'type_', $type->table);
            $route = str_replace('_', '-', $route);
        @endphp
        <url>
            <loc>{{ url('/') . '/' . $lang . '/file/' . $route }}/</loc>
            <lastmod>{{ $type->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
        </url>
    @endforeach
</urlset>
