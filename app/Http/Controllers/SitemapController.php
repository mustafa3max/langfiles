<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Table;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SitemapController extends Controller
{
    public function index()
    {

        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }

    public function types()
    {
        $types = Table::where('lang', LaravelLocalization::getCurrentLocale())->latest()->get();
        return response()->view('sitemap.types', [
            'types' => $types,
        ])->header('Content-Type', 'text/xml');
    }

    public function blogs()
    {
        $blogs = Blog::get();

        return response()->view('sitemap.blogs', [
            'blogs' => $blogs,
        ])->header('Content-Type', 'text/xml');
    }

    public function tools()
    {
        $tools = [
            "langtool-flutter",
            "langtool-laravel",
        ];

        return response()->view('sitemap.tools', [
            'tools' => $tools,
        ])->header('Content-Type', 'text/xml');
    }
}
