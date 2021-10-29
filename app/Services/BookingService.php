<?php

namespace App\Services;

use App\Contracts\UpdaterContract;
use Illuminate\Support\Facades\Validator;

final class BookingService implements UpdaterContract
{
    protected $rules = [
        'pet_id' => ['required', 'exists:pets,id'],
        'date' => ['required', 'after:today'],
    ];

    public function save(array $input)
    {
        $validate = Validator::make($input, $this->rules)->validateWithBag('save');

        \App\Models\Booking::create($validate);
    }
}
