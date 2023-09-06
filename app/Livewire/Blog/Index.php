<?php

namespace App\Livewire\Blog;

use App\Http\Globals;
use App\Models\Blog;
use Livewire\Component;

class Index extends Component
{
    public $search;

    function clearSersh()
    {

        if (strlen($this->search) >= 2) {
            $this->reset('search');
        }
    }

    function articles()
    {
        return Blog::where('title', 'LIKE', "%$this->search%")
            // ->orWhere('desc', 'LIKE', "%$this->search%")
            // ->where('enabled', true)
            ->orderByDesc('title')
            ->simplePaginate(10);
    }

    public function render()
    {
        return view('livewire.blog.index')->with([
            'articles' => $this->articles(),
            'share' => Globals::share(__('seo.title_articles'))
        ]);
    }
}
