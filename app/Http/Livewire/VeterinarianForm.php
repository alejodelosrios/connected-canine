<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use App\Models\Veterinarian;
use Livewire\Component;
use App\Services\Veterinarian as Updater;

class VeterinarianForm extends Component
{
    public $state;
    public $search;
    public $pet;

    protected $rules = [
        "state.id" => "required|exist:veterinarians,id",
    ];
    public function mount(Pet $pet)
    {
        $this->pet = $pet;

        if (!$pet->veterinarian) {
            $this->state = [];
        } else {
            $this->state = $pet->veterinarian->toArray();
        }
    }

    public function save()
    {
        $this->state["pet_id"] = $this->pet->id;
        $this->resetErrorBag();
        $updater = new Updater();
        $updater->save($this->state);
        $this->emit("saved");

        $this->emit("refresh-navigation-menu");
        $this->reset("search");
    }
    public function render()
    {
        return view("livewire.veterinarian-form");
    }

    public function getVetsProperty()
    {
        return Veterinarian::where(
            "vet_clinic",
            "LIKE",
            "%" . $this->search . "%"
        )
            ->take(10)
            ->get();
    }

    public function vet_data($vet)
    {
        $this->state["id"] = $vet["id"];
        $this->state["vet_clinic"] = $vet["vet_clinic"];
        $this->state["vet_city"] = $vet["vet_city"];
        $this->state["vet_address"] = $vet["vet_address"];
        $this->state["vet_zip_code"] = $vet["vet_zip_code"];
        $this->state["vet_phone_number"] = $vet["vet_phone_number"];
        $this->state["pet_id"] = $this->pet->id;
        $this->search = "";
    }
}
