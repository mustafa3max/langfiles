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
            'element_prefix' => '<li class="hover:bg-accent rounded-lg bg-primary-light dark:bg-primary-dark fa-lg flex">',
            'element_suffix' => '</li>',
            'target' => "_blank"

        ])->copylink(['class' => 'p-2 hover:bg-accent rounded-lg', 'title' => __('me_str.copy_link')])
            ->mailto(['class' => 'p-2 hover:bg-accent rounded-lg', 'title' => __('me_str.send_mail')])
            ->facebook(['class' => 'p-2 hover:bg-accent rounded-lg', 'title' => __('me_str.share_facebook')])
            ->twitter(['class' => 'p-2 hover:bg-accent rounded-lg', 'title' => __('me_str.share_twitter')])
            ->whatsapp(['class' => 'p-2 hover:bg-accent rounded-lg', 'title' => __('me_str.share_whatsapp')])
            ->telegram(['class' => 'p-2 hover:bg-accent rounded-lg', 'title' => __('me_str.share_telegram')])
            ->render();
    }
}
