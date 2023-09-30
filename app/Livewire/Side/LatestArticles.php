<?php

namespace App\Livewire\Side;

use App\Models\Blog;
use Livewire\Component;

class LatestArticles extends Component
{

    function latestArticles()
    {
        return Blog::orderByDesc('updated_at')
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.side.latest-articles')->with([
            'latestArticles' => $this->latestArticles()
        ]);
    }
}
