<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Services\BookingService as Updater;

class BookingForm extends Component
{
    public $state = [
        'pet_id' => '',
        'date' => ''
    ];


    public function save()
    {
        $this->resetErrorBag();

        $updater = new Updater;

        $updater->save($this->state);

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    public function render()
    {
        return view('livewire.booking-component', [
            'pets' => Auth::user()->pets
        ]);
    }
}
