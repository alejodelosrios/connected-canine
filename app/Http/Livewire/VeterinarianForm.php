<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\Veterinarian as Updater;

class VeterinarianForm extends Component
{
    public function mount(\App\Models\Veterinarian $vet)
    {
        $this->state = $vet->withoutRelations()->toArray();
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
        return view("livewire.veterinarian-form");
    }
}
