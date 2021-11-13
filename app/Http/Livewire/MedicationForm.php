<?php

namespace App\Http\Livewire;

use App\Services\Medication as MedicationServiceClass;
use Livewire\Component;

class MedicationForm extends Component
{

    public $pet;

    public $state;

    protected $medicationServiceClass;

    public function mount($pet, $medication = null)
    {
        $this->pet = $pet;

        if (isset($medication)) {
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
