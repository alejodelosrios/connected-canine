<?php

namespace App\Http\Livewire;

use App\Models\Breed;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\PetProfile as Updater;

class PetProfileForm extends Component
{
    use WithFileUploads;

    public $photo;

    public $state = [];

    protected $listeners = [
        "next" => "save",
        "save" => "save",
    ];

    public function mount($pet = null)
    {
        if (!is_null($pet)) {
            $this->state = $pet->withoutRelations()->toArray();
        }

        if (!array_key_exists("question", $this->state)) {
            $this->state["question"] = "no";
        }
        if (!array_key_exists("breed_id", $this->state) || !$this->state["breed_id"]) {
            $this->state["breed_id"] = "1";
        }
    }

    public function save()
    {
        $this->resetErrorBag();

        $updater = new Updater();
        $this->state['step'] = 1;
        $pet = $updater->save(
            $this->photo
                ? array_merge($this->state, ["photo" => $this->photo])
                : $this->state
        );

        $this->emit("saved", ["pet_id" => $pet->id]);

        $this->emit("refresh-navigation-menu");
    }

    public function render()
    {
        return view("livewire.pet-profile-form", [
            "breeds" => Breed::all(),
        ]);
    }

    public function getPetProperty()
    {
        return array_key_exists("id", $this->state)
            ? \App\Models\Pet::find($this->state["id"])
            : new \App\Models\Pet();
    }

    public function deleteProfilePhoto()
    {
        $this->pet->deleteProfilePhoto();

        $this->emit("refresh-navigation-menu");
    }
}
