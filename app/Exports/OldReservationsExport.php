<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OldReservationsExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return ["Employee", "Pet", "Reservation Date"];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect(Booking::getOldReservations());
    }
}
