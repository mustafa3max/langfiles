<?php

namespace App\Livewire\Help;

use App\Models\UsersMessages;
use Livewire\Component;

class CallUs extends Component
{

    public $email;
    public $title;
    public $message;

    function sendMessage()
    {
        $validated = $this->validate([
            'email' => 'required|email',
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:2550',
        ]);

        $countMessages = UsersMessages::get()->count();

        if ($countMessages < 2000) {
            UsersMessages::create([
                'email' => $validated['email'],
                'title' => $validated['title'],
                'message' => $validated['message'],
            ]);

            $this->reset(['email']);
            $this->reset(['title']);
            $this->reset(['message']);
            $this->dispatch('message', __('me_str.done_message'));
        } else {
            $this->dispatch('message', __('error.error_message'));
        }
    }

    public function render()
    {
        return view('livewire.help.call-us');
    }
}
