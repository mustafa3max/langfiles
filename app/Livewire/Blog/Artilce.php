<?php

namespace App\Livewire\Blog;

use App\Http\Globals;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Artilce extends Component
{

    public function render()
    {
        $article = Blog::where('id', request('id'))->get()->first();

        return view('livewire.blog.artilce')->with([
            'blog' => $article,
            'article' => Storage::disk('blog')->get('articles/' . $article->path),
            'share' => Globals::share($article->title),
            'author' => User::where('id', $article->author)->get('name')->first()->name,
        ]);
    }
}
