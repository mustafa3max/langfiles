<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @php
        $lang = 'ar';
        if (str_contains(request()->route()->uri, 'en/')) {
            $lang = 'en';
        }
    @endphp
    <sitemap>
        <loc>{{ url('/') }}/{{ $lang }}/sitemap.xml/types/</loc>
        @if ($lang == 'ar')
            <loc>{{ url('/') }}/ar/sitemap.xml/blogs/</loc>
        @endif
        <loc>{{ url('/') }}/{{ $lang }}/sitemap.xml/tools/</loc>
    </sitemap>
</sitemapindex>
