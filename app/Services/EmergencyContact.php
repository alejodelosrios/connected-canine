<?php

namespace App\Services;

use App\Models\EmergencyContact as Contact;
use App\Contracts\UpdaterContract;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

final class EmergencyContact implements UpdaterContract
{
    public function save(array $input)
    {
        $user = User::find($input["user_id"]);

        Validator::make($input, [
            "name" => ["required", "string", "max:255"],
            "lastname" => ["required", "string", "max:255"],
            "phone" => ["required", "digits:10"],
            "email" => ["required", "string", "max:255"],
        ])->validateWithBag("save");

        $contact = Contact::updateOrCreate(
            ["id" => $input["id"] ?? ""],
            [
                "name" => $input["name"],
                "lastname" => $input["lastname"],
                "phone" => $input["phone"],
                "email" => $input["email"],
            ]
        );

        $user->emergency_contact()->associate($contact);
        $user->save();
    }
}
