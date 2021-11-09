<?php

namespace App\Http\Livewire;

use App\Services\Medication as MedicationServiceClass;
use Livewire\Component;

class MedicationForm extends Component
{
    public $state;
    protected MedicationServiceClass $medicationServiceClass;

    public function mount(
        \App\Models\Pet $pet,
        \App\Models\Medication $medication
    ) {
        $this->pet = $pet;

        if ($medication) {
            $this->state = $medication->toArray();
        }
        $this->state["pet_id"] = $pet->id;
    }

    public function __construct($id)
    {
        parent::__construct($id);
        $this->medicationServiceClass = new MedicationServiceClass();
    }

    public function save()
    {
        $this->resetErrorBag();
        $this->medicationServiceClass->save($this->state);
        $this->emit("saved");

        $this->emit("refresh-navigation-menu");
        return redirect()->route("pet.medications", $this->pet);
    }

    public function render()
    {
        return view("livewire.medication-form");
    }
}
