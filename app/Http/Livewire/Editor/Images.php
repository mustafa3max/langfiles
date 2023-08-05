<?php

namespace App\Http\Livewire\Editor;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Images extends Component
{

    public $thumbnail;

    function images()
    {
        $iamgesAssets = [];
        $iamges = Storage::disk('blog')->files('images');
        foreach ($iamges as $image) {
            $iamgesAssets[] = asset('storage/blog/' . $image);
        }
        return $iamgesAssets;
    }
    public function render()
    {
        $this->images();
        return view('livewire.editor.images')->with(['images' => $this->images()]);
    }
}
