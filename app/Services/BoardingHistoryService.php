<?php

namespace App\Services;

use App\Models\Pet;
use App\Contracts\UpdaterContract;
use App\Models\BoardingHistory;
use Illuminate\Support\Facades\Validator;

final class BoardingHistoryService implements UpdaterContract
{
    protected $rules = [
        'attendend' => ['required', 'boolean'],
        'scuffle_event' => ['required_if:attendend,true', 'boolean'],
        'scuffle_description' => ['required_if:attendend,true', 'string'],
        'forbidden_assistance' => ['required_if:attendend,true', 'boolean'],
        'accomodations' => ['required_if:attendend,true', 'boolean'],
        'accomodations_description' => ['required_if:attendend,true', 'string'],
        'comments' => ['string']
    ];

    public function __construct(public Pet $pet)
    {
        //
    }

    public function save(array $input)
    {
        $validated = Validator::make($input, $this->rules)->validateWithBag('save');

        $this->pet->boardingHistory()->updateOrCreate($validated);
    }
}
