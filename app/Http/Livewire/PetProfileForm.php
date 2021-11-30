<?php

namespace App\Http\Livewire;

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
    }

    public function save()
    {
        $this->resetErrorBag();

        $updater = new Updater();
        $updater->save(
            $this->photo
                ? array_merge($this->state, ["photo" => $this->photo])
                : $this->state
        );

        $this->emit("saved");

        $this->emit("refresh-navigation-menu");
    }

    public function render()
    {
        return view("livewire.pet-profile-form");
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
