<?php

namespace App\Http\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;

class BookingsIndex extends Component
{
    public function render()
    {
        $reservations = Booking::paginate(8);
        return view("livewire.admin.bookings-index", compact("reservations"));
    }
}
