<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Services\BoardingHistoryService as Updater;

class BoardingHistoryForm extends Component
{

    public $state = [];

    public function mount($pet)
    {
        $this->pet = $pet;

        if ($pet->hasBoardingHistory()) {
            $this->state = $pet->boardingHistory->toArray();
        }
    }

    public function save()
    {

        $this->resetErrorBag();

        $update = new Updater($this->pet);

        $update->save($this->state);

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    public function render()
    {
        return view('livewire.boarding-history-form');
    }
}
