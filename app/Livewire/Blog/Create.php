<?php

namespace App\Livewire\Blog;

use App\Http\Globals;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Create extends Component
{
    #[Rule('required|string|unique:blogs')]
    public $title;

    #[Rule('required|string')]
    public $desc;

    #[Rule('required|string')]
    public $thumbnail = 'storage/blog/images/temporary_image.png';

    function create()
    {
        $attr = $this->validate();
        $namePath = Globals::syntaxKey($attr['title']);

        $disk = Storage::disk('blog');
        $disk->put('articles/' . $namePath . '.md', '## ' . $attr['title']);

        if (Storage::disk('blog')->exists('articles/' . $namePath . '.md')) {
            Blog::create([
                'title' => $attr['title'],
                'path' => $namePath . '.md',
                'desc' => $attr['desc'],
                'thumbnail' => $attr['thumbnail'],
                'author' => Auth::id(),
            ]);

            return redirect()->route('editor', ['path' => $namePath . '.md']);
        }
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
