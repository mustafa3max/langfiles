<?php

namespace App\Livewire\Blog;

use App\Http\Globals;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Create extends Component
{
    public $fileName;
    public $title;
    public $desc;

    function create()
    {
        $validated = $this->validate([
            'fileName' => 'required|string',
            'title' => 'required|string|unique:blogs',
            'desc' => 'required|string',
        ]);

        $namePath = Globals::syntaxKey($validated['fileName']);

        if (strlen($namePath) != mb_strlen($namePath, 'utf-8')) {
            return $this->dispatch('message', __('error.not_en_file_name'));
        }
        $disk = Storage::disk('blog');
        $disk->put('articles/' . $namePath . '.md', '## ' . $validated['title']);

        if (Storage::disk('blog')->exists('articles/' . $namePath . '.md')) {
            Blog::create([
                'title' => $validated['title'],
                'path' => $namePath . '.md',
                'desc' => $validated['desc'],
                'thumbnail' => 'storage/blog/images/temporary_image.png',
                'author' => Auth::id(),
            ]);

            return $this->redirect('/blog');
        }
    }

    function save()
    {
        if (strlen($this->article) >= 10) {
            dd($this->article);
        }
    }

    public function mount()
    {
        if (Auth::user()->owner !== 1) {
            return $this->redirect('blog');
        }
    }

    public function render()
    {

        return view('livewire.blog.create');
    }
}
