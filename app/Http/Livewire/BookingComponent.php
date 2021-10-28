<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingComponent extends Component
{
    public $state = [
        'pet_id' => '',
        'date' => ''
    ];


    public function save()
    {
        $this->resetErrorBag();

        Validator::make($this->state, [
            'pet_id' => ['required', 'exists:pets,id'],
            'date' => ['required', 'after:today'],
        ])->validateWithBag('save');

        \App\Models\Booking::create([
            'pet_id' => $this->state['pet_id'],
            'date' => $this->state['date'],
        ]);

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
