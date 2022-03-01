<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\UpdatePetWizardStep;
use Illuminate\Support\Facades\Validator;
use App\Services\VaccineService as Updater;

class VaccineForm extends Component
{
    use WithFileUploads;

    public $pet;

    public $state = [];

    protected $listeners = [
        "save" => "save",
    ];

    public function mount(Pet $pet)
    {
        $this->pet = $pet;

        if (isset($pet->vaccines)) {
            $this->state = [
                "proof" => $pet->vaccines->proof,
            ];
        }
    }

    public function render()
    {
        return view("livewire.vaccine-form");
    }

    public function save()
    {
        $this->resetErrorBag();

        Validator::make($this->state, [
            "proof" => ["required"],
        ])->validateWithBag("save");

        $updater = new Updater($this->pet);

        $updater->save($this->state);

        UpdatePetWizardStep::pushStep($this->pet, 2);

        $this->emit("saved", ["pet_id" => $this->pet->id]);

        $this->emit("refresh-navigation-menu");
    }

    public function removeProof()
    {
        $updater = new Updater($this->pet);
        $updater->removeProof($this->state["proof"]);

        $this->pet->refresh();
        $this->state["proof"] = $this->pet->vaccines->proof;
    }
}
