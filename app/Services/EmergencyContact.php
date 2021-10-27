<?php

namespace App\Services;

use App\Models\EmergencyContact as Contact;
use App\Contracts\UpdaterContract;
use Illuminate\Support\Facades\Validator;

final class EmergencyContact implements UpdaterContract
{
    public function save(array $input)
    {
        Validator::make($input, [
            "name" => ["required", "string", "max:255"],
            "lastname" => ["required", "string", "max:255"],
            "phone" => ["required", "string", "digits:10"],
            "email" => ["required", "string", "max:255"],
        ])->validateWithBag("save");

        Contact::updateOrCreate(
            ["id" => $input["id"] ?? ""],
            [
                //"user_id" => auth()->id(),
                "name" => $input["name"],
                "lastname" => $input["lastname"],
                "phone" => $input["phone"],
                "email" => $input["email"],
            ]
        );
    }
}
