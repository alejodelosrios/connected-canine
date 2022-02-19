<?php

namespace App\Http\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;

class BookingsIndex extends Component
{
    public $reservations;

    public function render()
    {
        $oldReservations = Booking::where("date", "<=", now())->paginate(8);
        $newReservations = Booking::where("date", ">", now())->paginate(8);
        return view(
            "livewire.admin.bookings-index",
            compact("oldReservations", "newReservations")
        );
    }
}
