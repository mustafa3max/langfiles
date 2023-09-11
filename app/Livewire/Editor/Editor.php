<?php

namespace App\Livewire\Editor;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Editor extends Component
{
    public $markdown = '';
    public $theme = 'default';

    function mount()
    {
        if (Storage::disk('blog')->exists('articles/' . request('path'))) {
            $this->markdown = Storage::disk('blog')->get('articles/' . request('path'));
        } else {
            return redirect()->route('create');
        }
    }

    public function render()
    {
        return view('livewire.editor.editor')->layout('components/layouts.editor');
    }
}
