<?php

namespace App\Http\Livewire\Blog;

use App\Http\Globals;
use App\Models\Blog;
use Livewire\Component;

class Artilce extends Component
{
    public function render()
    {
        $article = Blog::where('id', request('id'))->get()->first();
        return view('livewire.blog.artilce')->with([
            'article' => $article,
            'share' => Globals::share($article->title)
        ]);
    }
}
