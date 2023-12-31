<?php

namespace App\Livewire\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Update extends Component
{
    public $title;
    public $image;
    public $desc;
    public $articleQuery;
    public $idArticle;

    protected $rules = [
        'title' => 'required|string|min:50|max:255',
        'image' => 'required|string',
        'desc' => 'required|string|min:100|max:560',
        'article' => 'required|string|min:1000',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    function update()
    {
        $attr = $this->validate();
        Blog::where('id', $this->idArticle)
            ->update([
                'title' => $attr['title'],
                'image' => $attr['image'],
                'desc' => $attr['desc'],
                'article' => $attr['article'],
                'author' => Auth::user()->name,
            ]);
    }

    function article()
    {
        $article = Blog::where('id', $this->idArticle)->get()->first();

        if ($article != null) {
            $this->title = $article->title;
            $this->image = $article->image;
            $this->title = $article->title;
            $this->desc = $article->desc;
            $this->articleQuery = $article->article;
        }
    }

    public function mount()
    {
        $this->idArticle = request('id_article');
        $this->article();
    }

    public function render()
    {
        return view('livewire.blog.update');
    }
}
