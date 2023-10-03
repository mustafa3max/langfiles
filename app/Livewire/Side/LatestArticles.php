<?php

namespace App\Livewire\Side;

use App\Models\Blog;
use Livewire\Component;

class LatestArticles extends Component
{

    function latestArticles()
    {
        $path = str_replace('-', '_', request()->segment(count(request()->segments())));
        $path = $path . '.md';

        return Blog::where('path', '!=', $path)
            ->orderByDesc('updated_at')
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
