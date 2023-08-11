<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($types as $type)
        <url>
            <loc>{{ url('/') }}/file/type_{{ str_replace(' ', '_', $type->name_en) }}/</loc>
            <lastmod>{{ $type->updated_at }}</lastmod>
            <changefreq>monthly</changefreq>
        </url>
    @endforeach
</urlset>
