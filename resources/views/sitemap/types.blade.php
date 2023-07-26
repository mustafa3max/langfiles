<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($types as $type)
        <url>
            <loc>{{ url('/') }}/file?type={{ $type->table }}</loc>
            <changefreq>{{ $type->lang }}</changefreq>
            <changefreq>{{ $type->name_en }}</changefreq>
            <changefreq>{{ $type->name_ar }}</changefreq>
        </url>
    @endforeach
</urlset>
