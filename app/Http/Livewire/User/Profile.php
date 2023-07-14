<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Profile extends Component
{

    function logout()
    {
        auth()->guard('web')->logout();
        Session::flush();
        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.user.profile')->with(['user' => Auth::user()]);
    }
}
