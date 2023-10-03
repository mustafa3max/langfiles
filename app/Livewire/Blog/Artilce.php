<?php

namespace App\Livewire\Blog;

use App\Http\Globals;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class Artilce extends Component
{

    public function render()
    {
        $path = request('path');
        $path = str_replace('-', '_', $path);
        $path = $path . '.md';

        $article = Blog::where('path', $path)->get()->first();

        try {
            $markdown = Storage::disk('blog')->get('articles/' . $article->path);
        } catch (\Throwable $th) {
            abort(404);
        }

        return view('livewire.blog.artilce')->with([
            'blog' => $article,
            'article' => Str::markdown($markdown),
            'share' => Globals::share($article->title),
            'author' => User::where('id', $article->author)->get('name')->first()->name,
        ]);
    }
}
