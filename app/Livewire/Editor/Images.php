<?php

namespace App\Livewire\Editor;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Images extends Component
{

    public $thumbnail;

    protected $listeners = ['image' => 'selestImage'];

    function images()
    {
        $iamgesAssets = [];
        $iamges = Storage::disk('blog')->files('images');
        foreach ($iamges as $image) {
            $iamgesAssets[] = asset('storage/blog/' . $image);
        }
        return $iamgesAssets;
    }

    function selestImage($src = '')
    {
        if ($src != '') {
            $this->thumbnail = $src;
        }
        $this->dispatchBrowserEvent('image', ['src' => $this->thumbnail]);
    }

    public function render()
    {
        return view('livewire.editor.images')->with(['images' => $this->images()]);
    }
}
