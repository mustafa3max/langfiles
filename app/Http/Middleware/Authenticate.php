<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Authenticate extends Middleware
{

    protected function redirectTo(Request $request): ?string
    {
        session()->put('path_previous', $request->url());
        return $request->expectsJson() ? null : route('login');
    }
}
