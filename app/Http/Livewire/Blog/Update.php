<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Update extends Component
{
    public $title;
    public $article;
    public $idArticle;

    protected $rules = [
        'title' => 'required|string|min:50|max:255',
        'article' => 'required|string|min:1000|max:5000',
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
                'article' => $attr['article'],
                'author' => Auth::user()->name,
            ]);
    }

    function article()
    {
        $article = Blog::where('id', $this->idArticle)->get()->first();

        if ($article != null) {
            $this->title = $article->title;
            $this->article = $article->article;
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
