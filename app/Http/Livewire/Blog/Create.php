<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $article;

    protected $rules = [
        'title' => 'required|string|min:50|max:255',
        'article' => 'required|string|min:1000|max:5000',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    function create()
    {
        $attr = $this->validate();

        Blog::create([
            'title' => $attr['title'],
            'article' => $attr['article'],
            'author' => Auth::user()->name,
        ]);

        return redirect()->route('index');
    }

    function save()
    {
        if (strlen($this->article) >= 10) {
            dd($this->article);
        }
    }

    public function render()
    {

        return view('livewire.blog.create');
    }
}
