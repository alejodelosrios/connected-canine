<?php

namespace App\Services;

use App\Models\Pet;
use App\Contracts\UpdaterContract;
use App\Models\Breed;
use Illuminate\Support\Facades\Validator;

final class PetProfile implements UpdaterContract
{
    public function save(array $input)
    {
        //dd($input);
        Validator::make($input, [
            "name" => ["required", "string", "max:255"],
            "birthday" => ["required", "before:today"],
            "sex" => ["required", "string", "in:male,female"],
            "weight" => ["required", "numeric", "min:1"],
            "breed_id" => ["required", "exists:breeds,id"],
            "question" => ["required", "string"],
            "photo" => ["nullable", "mimes:jpg,jpeg,png", "max:1024"],
        ])->validateWithBag("save");

        //dd($input);

        $pet = Pet::updateOrCreate(
            ["id" => $input["id"] ?? 0],
            [
                //dd($input["question"]),
                "user_id" => auth()->id(),
                "name" => $input["name"],
                "birthday" => $input["birthday"],
                "sex" => $input["sex"],
                "weight" => $input["weight"],
                "breed_id" => $input["breed_id"],
                "question" => $input["question"],
            ]
        );

        if (isset($input["photo"])) {
            $pet->updateProfilePhoto($input["photo"]);
        }

        return $pet;
    }
}
