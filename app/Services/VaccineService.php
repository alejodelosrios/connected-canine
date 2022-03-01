<?php

namespace App\Services;

use App\Models\Vaccine;
use Illuminate\Validation\Rule;
use App\Contracts\UpdaterContract;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

final class VaccineService implements UpdaterContract
{
    public $pet;

    protected $messages = [
        "after" => "Expiration must be in the future.",
    ];

    public function __construct($pet)
    {
        $this->pet = $pet;
    }

    public function save(array $input)
    {
        $input = $this->prepareToValidate($input);


        if (isset($input["proof"]) && !($input["proof"] instanceof \Livewire\TemporaryUploadedFile)) {
            unset($input["proof"]);
        }

        $validated = Validator::make(
            $input,
            $this->rules($input),
            $this->messages
        )->validateWithBag("save");




        if (isset($input["proof"]) && ($input["proof"] instanceof \Livewire\TemporaryUploadedFile)) {
            $path = $input["proof"]->store("proofs");
            $validated["proof"] = $path;
        }

        Vaccine::updateOrCreate(["pet_id" => $this->pet->id], $validated);
    }

    public function removeProof(string $file_name)
    {
        if (Storage::exists($file_name)) {
            Storage::delete($file_name);
        }

        $this->pet->vaccines->forceFill(["proof" => null])->save();
    }

    public function rules($input)
    {
        return [
            "has_rabies" => ["required", "boolean"],
            "rabies" => [
                "nullable",
                "bail",
                Rule::requiredIf(function () use ($input) {
                    return auth()
                        ->user()
                        ->hasRole("Admin") && $input["has_rabies"] == true;
                }),
                "after:today",
            ],
            "has_bordetella" => ["required", "boolean"],
            "bordetella" => [
                "nullable",
                "bail",
                Rule::requiredIf(function () use ($input) {
                    return auth()
                        ->user()
                        ->hasRole("Admin") && $input["has_bordetella"] == true;
                }),
                "after:today",
            ],
            "has_dhhp" => ["required", "boolean"],
            "dhhp" => [
                "nullable",
                "bail",
                Rule::requiredIf(function () use ($input) {
                    return auth()
                        ->user()
                        ->hasRole("Admin") && $input["has_dhhp"] == true;
                }),
                "after:today",
            ],
            "proof" => ["nullable", Rule::requiredIf(isset($input["proof"]) && ($input["proof"] instanceof \Livewire\TemporaryUploadedFile)), "file", "mimes:png,jpg,pdf", "max:5120"],
        ];
    }
    public function prepareToValidate($input)
    {
        $data = [];

        foreach (["rabies", "bordetella", "dhhp"] as $key) {
            $data["has_" . $key] = array_key_exists("has_" . $key, $input)
                ? $input["has_" . $key]
                : false;
            $data[$key] = array_key_exists($key, $input) ? $input[$key] : null;
            if ($data["has_" . $key] == false) {
                $data[$key] = null;
            }
        }

        if (isset($input["proof"])) {
            $data["proof"] = $input["proof"];
        }

        return $data;
    }
}
