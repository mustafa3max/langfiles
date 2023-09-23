<?php

namespace App\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class Delete extends Component
{

    public $title;

    function delete($id)
    {
        $validated = $this->validate([
            'title' => 'required|string',
        ]);

        $article = Blog::where('title', $validated['title'])
            ->where('id', $id)
            ->get()->first();

        if ($article !== null && $id === $article->id) {
            Blog::where('title', $validated['title'])
                ->where('id', $id)
                ->delete();
        }
    }
    public function render()
    {
        $articles = Blog::get();
        return view('livewire.blog.delete')->with([
            'articles' => $articles
        ]);
    }
}
