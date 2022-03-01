<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use App\Services\UpdatePetWizardStep;
use App\Services\BoardingHistoryService as Updater;

class BoardingHistoryForm extends Component
{

    public $state = [];

    protected $listeners = [
        'save' => 'save'
    ];

    public function mount(Pet $pet)
    {
        $this->pet = $pet;

        if ($pet->hasBoardingHistory()) {
            $this->state = $pet->boardingHistory->toArray();
        }

        if (array_key_exists('attended', $this->state) && data_get($this->state, 'attended') == false) {
            $this->state = ['attended' => 0];
        }

        $this->state['pet_id'] = $pet->id;
    }

    public function save()
    {
        $this->resetErrorBag();

        $update = new Updater($this->pet);

        $update->save($this->state);

        UpdatePetWizardStep::pushStep($this->pet, 4);

        $this->emit("saved", ["pet_id" => $this->pet->id]);

        $this->emit('refresh-navigation-menu');
    }

    public function render()
    {
        return view('livewire.boarding-history-form');
    }
}
