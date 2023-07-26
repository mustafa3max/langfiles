<?php

namespace App\Http\Controllers;

use App\Models\Table;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');;
    }

    public function types()
    {
        $types = Table::latest()->get();
        return response()->view('sitemap.types', [
            'types' => $types,
        ])->header('Content-Type', 'text/xml');
    }
}
