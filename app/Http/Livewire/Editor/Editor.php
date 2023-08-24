<?php

namespace App\Http\Livewire\Editor;

use App\Models\Blog;
use Livewire\Component;

class Editor extends Component
{
    public $idArticle;
    public $save = true;

    public Blog $blog;

    protected $queryString = ['idArticle'];

    protected $rules = [
        'blog.title' => 'required|string',
        'blog.desc' => 'required|string',
        'blog.thumbnail' => 'required|string',
        'blog.article' => 'required|string',
        'save' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
        $this->publishArticle();
    }

    public function publishArticle()
    {
        $blog = Blog::where('id', $this->idArticle)->get()->first();

        $validate = $this->validate();

        $this->blog->save();

        if ($blog !== null) {
            $this->save = trim($blog->article) !== trim($validate['blog']['article']);
        }
    }

    public function mount()
    {
        $blog = Blog::where('id', $this->idArticle)->get()->first();
        if ($blog != null) {
            $this->blog  = $blog;
        } else {
            return redirect()->route('create');
        }
    }

    public function render()
    {
        return view('livewire.editor.editor')->layout('layouts.editor');
    }
}
