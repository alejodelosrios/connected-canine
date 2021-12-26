<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Contracts\UpdaterContract;
use Illuminate\Support\Facades\Validator;

final class BookingService implements UpdaterContract
{

    //TODO: CHECK FOR CUSTOM MESSAGGE DISLAY
    protected $custom_message = [
        'pet_id.required' => 'Select Your Pet',
        'pet_id.exists' => 'The chosen pet does not appear in our records',
        'pet_id.unique' => 'The chosen pet already has an approved reservation or pending approval',
        'date.required' => 'Date is required',
        'date.after' => 'The date must be after today',
    ];

    public function save(array $input)
    {
        $validated = Validator::make($input, $this->rules($input), $this->custom_message)->validateWithBag('save');

        \App\Models\Booking::create($validated);
    }

    private function rules($input)
    {
        return [
            'pet_id' => [
                'required', 'exists:pets,id',
                Rule::unique('bookings')->where(function ($query) use ($input) {
                    return $query->where('pet_id', $input['pet_id'])->where('date', '>=', Carbon::today())
                        ->where('status', '<>', \App\Models\Booking::CANCELLED);
                })
            ],
            'date' => ['required', 'after:today']
        ];
    }
}
