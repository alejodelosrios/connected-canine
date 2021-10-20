
<?php namespace App\Services;

use App\Contracts\UpdaterContract;
use App\Models\Veterinarian as ModelsVeterinarian;
use Illuminate\Support\Facades\Validator;

final class Veterinarian implements UpdaterContract
{
    public function save(array $input)
    {
        Validator::make($input, [
            "vet_clinic" => ["required", "string", "max:255"],
            "vet_address" => ["nullable", "string", "max:255"],
            "vet_phone_number" => ["required", "string", "in:male,female"],
        ])->validateWithBag("save");

        ModelsVeterinarian::updateOrCreate(
            ["id" => $input["id"] ?? ""],
            [
                "vet_clinic" => $input["vet_clinic"],
                "vet_address" => $input["vet_address"],
                "vet_phone_number" => $input["vet_phone_number"],
            ]
        );
    }
}
