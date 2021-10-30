<?php

namespace App\Services;

use App\Models\Pet;
use App\Contracts\UpdaterContract;
use App\Models\BoardingHistory;
use Illuminate\Support\Facades\Validator;

final class BoardingHistoryService implements UpdaterContract
{
    //TODO: LOOK FOR BUG - COMMENTS CAN'T SAVE
    protected $rules = [
        'attended' => ['required', 'boolean'],
        'scuffle_event' => ['required_if:attended,true', 'boolean'],
        'scuffle_description' => ['required_if:scuffle_event,true', 'nullable', 'string'],
        'forbidden_assistance' => ['required_if:attended,true', 'boolean'],
        'accomodations' => ['required_if:attended,true', 'boolean'],
        'accomodations_description' => ['required_if:accomodations,true', 'nullable', 'string'],
        'comments' => ['nullable', 'string']
    ];

    protected $custom_messages = [
        'attended' => "You must choose an option to continue",
    ];

    public function __construct(public Pet $pet)
    {
        //
    }

    public function save(array $input)
    {
        $validated = Validator::make($input, $this->rules, $this->custom_messages)->validateWithBag('save');

        if ($validated['attended']) {
            $this->pet->boardingHistory()->updateOrCreate(['pet_id' => $input['pet_id']], $validated);
        }
    }
}
