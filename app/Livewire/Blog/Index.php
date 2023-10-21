<?php

namespace App\Livewire\Blog;

use App\Http\Globals;
use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    function clearSersh()
    {

        if (strlen($this->search) >= 2) {
            $this->reset('search');
        }
    }

    function articles()
    {
        return Blog::with(['users' => function ($query) {
            $query->select(['id', 'name']);
        }])
            ->where('title', 'LIKE', "%$this->search%")
            ->orWhere('desc', 'LIKE', "%$this->search%")
            ->where('enabled', true)
            ->orderByDesc('updated_at')
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
