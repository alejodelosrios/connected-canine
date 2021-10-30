<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Services\BoardingHistoryService as Updater;

class BoardingHistoryForm extends Component
{

    public $state = [
        'attended' => false
    ];

    protected $listeners = [
        'save' => 'save'
    ];

    public function mount($pet)
    {
        $this->pet = $pet;

        if ($pet->hasBoardingHistory()) {
            $this->state = $pet->boardingHistory->toArray();
            $this->state['attended'] = true;
        }
        $this->state['pet_id'] = $pet->id;
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
