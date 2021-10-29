<?php

namespace App\Http\Livewire;

use App\Models\EmergencyContact;
use Livewire\Component;
use App\Services\EmergencyContact as Updater;
use Illuminate\Support\Facades\Auth;

class EmergencyContactForm extends Component
{
    public $state;

    public function mount()
    {
        $user = Auth::user();
        $contact = EmergencyContact::find($user->emergency_contact_id);
        $this->state = $contact?->withoutRelations()->toArray() ?? [];

        $this->state["user_id"] = $user->id;
    }

    public function save()
    {
        $this->resetErrorBag();
        $updater = new Updater();
        $updater->save($this->state);
        $this->emit("saved");

        $this->emit("refresh-navigation-menu");
    }
    public function render()
    {
        return view("livewire.emergency-contact-form");
    }
}
