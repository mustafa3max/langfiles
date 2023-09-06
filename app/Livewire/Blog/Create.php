<?php

namespace App\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class Create extends Component
{
    public $title = 'العنوان';
    public $desc = 'الوصف';
    public $article = 'المقال';
    public $thumbnail = 'storage/blog/images/temporary_image.png';

    protected $rules = [
        'title' => 'required|string',
        'desc' => 'required|string',
        'article' => 'required|string',
        'thumbnail' => 'required|string',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    function create()
    {
        $attr = $this->validate();

        $blog = Blog::create([
            'title' => $attr['title'],
            'article' => $attr['article'],
            'desc' => $attr['desc'],
            'thumbnail' => $attr['thumbnail'],
            'author' => 'mustafamax',
        ]);

        return redirect()->route('editor', ['idArticle' => $blog->id]);
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
