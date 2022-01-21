<?php

namespace App\Services;

use App\Contracts\UpdaterContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

final class InsuranceService implements UpdaterContract
{
    protected $rules = [
        "proof" => ["required", "file", "mimes:png,jpg,pdf", "max:102400"],
    ];

    public function save(array $input)
    {
        Validator::make($input, $this->rules)->validateWithBag("save");

        $path = $input["proof"]->store("insurance-proofs");
        $user = Auth::user();
        $data["proof"] = $path;

        $user->insurance()->updateOrCreate(["user_id" => $user->id], $data);
    }

    public function removeProof(string $file_name)
    {
        if (Storage::exists($file_name)) {
            Storage::delete($file_name);
        }

        $user = Auth::user();
        $user->insurance->forceFill([
            "proof" => null,
        ])->save();
    }

    private function isNotAEmptyData($data)
    {
        return isset($data["proof"]);
    }
}
