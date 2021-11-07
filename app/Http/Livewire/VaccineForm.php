<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;

class VaccineForm extends Component
{
    public $pet;

    public $state = [];

    public function mount(Pet $pet)
    {
        $this->pet = $pet;
    }

    public function render()
    {
        return view('livewire.vaccine-form');
    }
}
