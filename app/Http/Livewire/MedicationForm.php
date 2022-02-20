<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use App\Models\Medication;
use App\Services\Medication as MedicationServiceClass;

class MedicationForm extends Component
{

    public $pet;

    public $state;

    protected $medicationServiceClass;

    public $showModal = false;

    private $default = [
        'frequency' => 'hourly',
        'status' => '1',
        'time_block' => 'morning',
        'prescription' => '1'
    ];


    public function mount(Pet $pet, $medication = null)
    {
        $this->pet = $pet;

        $this->state = $this->default;

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
        $this->emit("refresh-navigation-menu");
        $this->reset('state');

        $this->state = $this->default;
        $this->state["pet_id"] = $this->pet->id;
        $this->showModal = false;
    }

    public function delete($id)
    {
        $this->medicationServiceClass->delete($id);
    }

    public function edit($id)
    {
        $this->state = Medication::find($id)->toArray();
        $this->showModal = true;
    }

    public function cancel()
    {
        $this->state = [];
        $this->state = $this->default;
        $this->state["pet_id"] = $this->pet->id;
        $this->showModal = false;
    }

    public function render()
    {
        return view("livewire.medication-form", [
            'medications' => $this->pet->medications()->paginate(4)
        ]);
    }
}
