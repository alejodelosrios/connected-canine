<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use App\Models\Veterinarian;
use Livewire\Component;
use App\Services\Veterinarian as Updater;
use Illuminate\Support\Facades\Validator;

class VeterinarianForm extends Component
{
    public $state = [];
    public $search;
    public Pet $pet;
    protected $updater;

    public function __construct($id)
    {
        parent::__construct($id);
        $this->updater = new Updater();
    }
    protected $rules = [
        "state.id" => "required|exist:veterinarians,id",
        "state.vet_clinic" => "required|string",
        "state.vet_address" => "required|string",
        "state.vet_phone_number" => "required|string",
        "state.vet_city" => "required|string",
        "state.vet_zip_code" => "required|string",
    ];
    public function mount(Pet $pet, $hasError = false)
    {
        $this->pet = $pet;

        if ($hasError) {
            $this->updater->validate($this->state);
        }

        if ($pet->veterinarian) {
            $this->state = $pet->veterinarian->toArray();
        }
    }

    public function save()
    {
        $this->state["pet_id"] = $this->pet->id;
        $this->resetErrorBag();
        $this->updater->save($this->state);
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
