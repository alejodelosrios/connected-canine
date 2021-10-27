<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\EmergencyContact as Updater;

class EmergencyContactForm extends Component
{
    public function mount(\App\Models\EmergencyContact $contact)
    {
        $this->state = $contact->withoutRelations()->toArray();
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
