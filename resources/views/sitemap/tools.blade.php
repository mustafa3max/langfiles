<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @php
        $lang = 'ar';
        if (str_contains(request()->route()->uri, 'en/')) {
            $lang = 'en';
        }
    @endphp
    @foreach ($tools as $tool)
        <url>
            <loc>{{ url('/') . '/' . $lang . '/tools/' . $tool }}/</loc>
            <changefreq>monthly</changefreq>
        </url>
    @endforeach
</urlset>
