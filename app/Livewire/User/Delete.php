<?php

namespace App\Livewire\User;

use App\Models\User;
use Auth;
use Hash;
use Livewire\Component;

class Delete extends Component
{
    public $email;
    public $password;

    public function delete()
    {
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::user()->email == $validated['email'] && Hash::check($validated['password'], Auth::user()->password)) {
            $this->reset(['email']);
            $this->reset(['password']);

            $delete = User::where('email', Auth::user()->email)->delete();

            if ($delete) {
                session()->flush();
                auth('web')->logout();
                $this->dispatch('message', __('me_str.done_delete_account'));
                return redirect('/types');
            } else {
                $this->dispatch('message', __('me_str.error_delete_account'));
            }
        } else {
            $this->dispatch('message', __('me_str.error_delete_account'));
        }
    }

    public function render()
    {
        return view('livewire.user.delete')->with([
            'user' => Auth::user()
        ]);
    }
}
