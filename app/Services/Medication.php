<?php

namespace App\Services;

use App\Contracts\UpdaterContract;
use App\Models\Medication as ModelsMedication;
use App\Models\Pet;
use Illuminate\Support\Facades\Validator;

final class Medication implements UpdaterContract
{
    public function save(array $input)
    {
        Validator::make($input, [
            "name" => ["required", "string", "max:255"],
            "status" => ["required"],
            "frequency" => ["required", "string", "max:255"],
            "time_block" => ["required", "string", "max:50"],
            "purpose" => ["required", "string", "max:255"],
            "prescription" => ["required"],
            "dosage" => ["required", "string", "max:255"],
            "instructions" => ["required", "string", "max:255"],
        ])->validateWithBag("save");

        $medication = ModelsMedication::updateOrCreate(
            ["id" => $input["id"] ?? ""],
            [
                "name" => $input["name"],
            ]
        );

        $pet = Pet::find($input["pet_id"]);
        $pet->medications()->attach($medication->id, [
            "status" => $input["status"],
            "frequency" => $input["frequency"],
            "time_block" => $input["time_block"],
            "purpose" => $input["purpose"],
            "prescription" => $input["prescription"],
            "dosage" => $input["dosage"],
            "instructions" => $input["instructions"],
        ]);
    }
}
