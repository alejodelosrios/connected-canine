<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserMessageSent;
use Livewire\Component;

class MessageForm extends Component
{
    public $message = "";

    protected $rules = [
        "message" => "required|string|max:255",
    ];

    public function render()
    {
        return view("livewire.message-form");
    }

    public function sendMessage()
    {
        $this->validate();

        Mail::to("admin@connected-canine.test")->send(
            new UserMessageSent($this->message)
        );
        $this->emit("sent");

        $this->reset("message");
    }
}
