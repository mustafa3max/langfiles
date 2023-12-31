<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SignUp extends Component
{
    public $name;
    public $email;
    public $password;

    public function register()
    {

        $validated = $this->validate([
            'name' => 'required|string|min:2|regex:/^[a-zA-Z]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{4,}$/',
        ]);

        $user = User::create([
            'email' => strtolower($validated['email']),
            'password' => Hash::make($validated['password']),
            'name' => $validated['name'],
        ]);

        if (Auth::attempt(['name' => $validated['name'], 'email' => $validated['email'], 'password' => $validated['password']], true)) {
            // event(new Registered($user));

            return $this->redirect(url()->to('types'));
            // return $this->redirect(url()->to('email/verify'));
        }
    }

    public function mount()
    {

        if (Auth::check()) {
            return $this->redirect('/types');
        }
    }

    public function render()
    {
        return view('livewire..auth.sign-up');
    }
}
