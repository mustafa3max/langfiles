<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Owner
{
    public function handle(Request $request, Closure $next)
    {
        $tokenCheck = 'ytLaeC3fKTzSuvh1RUB25fkWa0HiB5CoE8lIYTJlaIUnvnjaQKMHubvMZlDwglOJ';
        if ($request->token != $tokenCheck) {
            return redirect('/');
        }

        return $next($request);
    }
}
