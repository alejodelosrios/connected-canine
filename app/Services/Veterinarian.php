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

        Validator::make($input, [
            "id" => ["required", "exists:veterinarians,id"],
        ])->validateWithBag("save");

        $veterinarian = ModelsVeterinarian::find($input["id"]);
        $pet->veterinarian()->associate($veterinarian);
        //dd($pet);
        $pet->save();
    }
}
