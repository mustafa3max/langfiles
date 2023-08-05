<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;

class Editor extends Component
{
    public $title;
    public $desc;
    public $thumbnail;
    public $article;

    protected $rules = [
        'title' => 'required|string|min:25|max:255',
        'desc' => 'required|string|min:100|max:560',
        'thumbnail' => 'required|string',
        'article' => 'required|string',
    ];

    function publishArticle()
    {
        dd(session('title-article'));
        $attr = $this->validate();
        dd($attr['article']);
    }

    public function render()
    {
        return view('livewire.editor.editor')
            ->layout('layouts.editor');
    }
}
