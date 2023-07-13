<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class CreateDataAccountController extends Controller
{
    public function create()
    {
        $name = Str::random(20);
        $email = Str::random(20) . '@' . 'langfiles.com';
        $password = Str::random(16);

        return [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ];
    }
}
