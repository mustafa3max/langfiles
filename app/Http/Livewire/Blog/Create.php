<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $desc;
    public $article;

    protected $rules = [
        'title' => 'required|string|min:50|max:255',
        'desc' => 'required|string|min:100|max:560',
        'article' => 'required|string|min:1000',
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
            'desc' => $attr['desc'],
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
