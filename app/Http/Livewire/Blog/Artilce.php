<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class Artilce extends Component
{
    public function render()
    {
        return view('livewire.blog.artilce')->with(['article' => Blog::where('id', request('id_article'))->get()->first()]);
    }
}
