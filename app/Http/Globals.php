<?php

namespace App\Http;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PhpParser\Node\Expr\Cast\Array_;

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

    static function supportedExtensions()
    {
        return ['json', 'php', 'android', 'ios', 'django', 'xlf', 'csv'];
    }

    static function logout()
    {
        if (Auth::check()) {
            session()->flush();

            auth('web')->logout();

            return redirect('/');
        }
    }

    static function syntaxKey($key)
    {
        $key = str_split($key);

        for ($i = 0; $i < count($key); $i++) {
            if (preg_replace(' /\d/u', '', $key[0]) === '') {
                array_splice($key, array_search($key[0], $key), 1);
            } elseif (preg_replace('/[^ا-يA-Za-z0-9]/', '', $key[0]) === '') {
                array_splice($key, array_search($key[0], $key), 1);
            }
        }

        $key = implode('', $key);

        $key = str_replace(' ', '_', $key);
        $key = str_replace('-', '_', $key);
        $key = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));
        $key = trim($key, '_');
        $key = preg_replace('/[^ا-يA-Za-z0-9\-_]/', '', $key);
        $key = preg_replace('/_+/', '_', $key);

        return $key;
    }
}
