<?php

namespace App\Services;

use App\Contracts\UpdaterContract;
use App\Models\Veterinarian as ModelsVeterinarian;
use Illuminate\Support\Facades\Validator;
use App\Models\Pet;

final class Veterinarian implements UpdaterContract
{
    public function save(array $input)
    {
        $pet = Pet::find($input["pet_id"]);



        if (!isset($input["id"])) {
            $veterinarian["vet_clinic"] = $input["vet_clinic"];
            $veterinarian["vet_city"] = $input["vet_city"];
            $veterinarian["vet_address"] = $input["vet_address"];
            $veterinarian["vet_zip_code"] = $input["vet_zip_code"];
            $veterinarian["vet_phone_number"] = $input["vet_phone_number"];

            $vet = $pet->veterinarian()->create($veterinarian);
        } else {
            $this->validate($input);

            $vet = ModelsVeterinarian::find($input["id"]);
            if ($vet) {
                $vet->id = $input["id"];
                $vet->vet_clinic = $input["vet_clinic"];
                $vet->vet_city = $input["vet_city"];
                $vet->vet_address = $input["vet_address"];
                $vet->vet_zip_code = $input["vet_zip_code"];
                $vet->vet_phone_number = $input["vet_phone_number"];

                $vet->save();
            }
        }
        $pet->veterinarian()->associate($vet);
        $pet->save();
    }

    public function validate($input)
    {
        Validator::make($input, [
            "id" => ["required", "exists:veterinarians,id"],
            "vet_clinic" => "required|string",
            "vet_address" => "required|string",
            "vet_phone_number" => "required|string",
            "vet_city" => "required|string",
            "vet_zip_code" => "required|string",
        ])->validateWithBag("save");
    }
}
