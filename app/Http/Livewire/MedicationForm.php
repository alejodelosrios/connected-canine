<?php

namespace App\Http\Livewire;

use App\Services\Medication as Updater;
use Livewire\Component;

class MedicationForm extends Component
{
    public $state;

    public function mount(\App\Models\Pet $pet)
    {
        $this->pet = $pet;

        if ($pet->hasMedications()) {
            $this->state = $pet->medications->toArray();
        }
        $this->state["pet_id"] = $pet->id;
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
        return view("livewire.medication-form");
    }
}
