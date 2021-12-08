<?php

namespace App\Services;

use App\Models\Vaccine;
use App\Contracts\UpdaterContract;
use App\Models\Insurance;
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
        $validated = Validator::make($input, $this->rules)->validateWithBag(
            "save"
        );

        $path = $input["proof"]->store("insurance-proofs", "s3");
        $user = Auth::user();
        $data["proof"] = $path;

        $user->insurance()->updateOrCreate(["user_id" => $user->id], $data);
    }

    public function removeProof(string $file_name)
    {
        if (Storage::disk("s3")->exists($file_name)) {
            Storage::disk("s3")->delete($file_name);
        }

        $user = Auth::user();
        $user->insurance
            ->forceFill([
                "proof" => null,
            ])
            ->save();
    }

    private function isNotAEmptyData($data)
    {
        return isset($data["proof"]);
    }
}
