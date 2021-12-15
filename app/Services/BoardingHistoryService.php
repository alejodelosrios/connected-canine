<?php

namespace App\Services;

use App\Contracts\UpdaterContract;
use Illuminate\Support\Facades\Validator;

final class BoardingHistoryService implements UpdaterContract
{
    public $pet;

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

    protected $messages = [
        'required_if' => "Choose an option",
        'scuffle_description.required_if' => "Description required",
        'accomodations_description.required_if' => "Explanation required",
    ];

    public function __construct($pet)
    {
        $this->pet = $pet;
    }

    public function save(array $input)
    {
        $validated = Validator::make($input, $this->rules, $this->messages)->validateWithBag('save');

        if ($validated['attended']) {
            $this->pet->boardingHistory()->updateOrCreate(['pet_id' => $input['pet_id']], $validated);
        }
    }
}
