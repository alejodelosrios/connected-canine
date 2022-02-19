<?php

namespace App\Http\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;

class BookingsIndex extends Component
{
    public $active = 1;

    public function render()
    {
        $reservations = Booking::when($this->active == 2, function ($q) {
            return $q->where("date", "<=", now());
        })
            ->when($this->active == 1, function ($q) {
                return $q->where("date", ">", now());
            })
            ->orderBy("date", "asc")
            ->paginate(8);
        return view("livewire.admin.bookings-index", compact("reservations"));
    }
}
