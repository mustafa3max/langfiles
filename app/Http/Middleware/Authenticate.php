<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{

    protected function redirectTo(Request $request): ?string
    {
        session()->put('path_previous', $request->url());
        return $request->expectsJson() ? null : route('sign-in');
    }
}
