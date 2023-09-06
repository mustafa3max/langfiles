<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.user.profile')->with(['user' => Auth::user()]);
    }
}
