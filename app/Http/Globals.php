<?php

namespace App\Http;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class Globals
{
    static public function diskTypes()
    {
        return 'types';
    }

    static public function languages()
    {
        return ['ar', 'en'];
    }

    static public function share($title)
    {
        return \ShareButtons::page(URL::full(), __('tables.' . $title), [
            'title' => config('app.name'),
            'rel' => 'nofollow noopener noreferrer',
            'block_prefix' => '<ul class="flex flex-wrap gap-1 justify-center items-center">',
            'block_suffix' => '</ul>',
            'element_prefix' => '<li class="hover:bg-accent rounded-lg bg-secondary-light dark:bg-secondary-dark">',
            'element_suffix' => '</li>',

        ])->copylink(['class' => 'hover:bg-accent rounded-lg w-12 h-12 flex items-center justify-center', 'title' => __('me_str.copy_link'), 'text' => 'url new'])
            ->mailto(['class' => 'hover:bg-accent rounded-lg w-12 h-12 flex items-center justify-center', 'title' => __('me_str.send_mail')])
            ->facebook(['class' => 'hover:bg-accent rounded-lg w-12 h-12 flex items-center justify-center', 'title' => __('me_str.share_facebook')])
            ->twitter(['class' => 'hover:bg-accent rounded-lg w-12 h-12 flex items-center justify-center', 'title' => __('me_str.share_twitter')])
            ->whatsapp(['class' => 'hover:bg-accent rounded-lg w-12 h-12 flex items-center justify-center', 'title' => __('me_str.share_whatsapp')])
            ->telegram(['class' => 'hover:bg-accent rounded-lg w-12 h-12 flex items-center justify-center', 'title' => __('me_str.share_telegram')])
            ->render();
    }
}
