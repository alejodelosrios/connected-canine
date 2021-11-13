<?php

namespace App\Services;

use App\Models\Vaccine;
use App\Contracts\UpdaterContract;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

final class VaccineService implements UpdaterContract
{
    public $pet;
    protected $rules = [
        'has_rabies' => ['required', 'boolean'],
        'rabies' => ['required_if:has_rabies,true', 'nullable', 'after:today'],
        'has_bordetella' => ['required', 'boolean'],
        'bordetella' => ['required_if:has_bordetella,true', 'nullable', 'after:today'],
        'has_dhhp' => ['required', 'boolean'],
        'dhhp' => ['required_if:has_dhhp,true', 'nullable', 'after:today'],
        'proof' => ['nullable', 'file', 'mimes:png,jpg,pdf', 'max:102400']
    ];

    public function __construct($pet)
    {
        $this->pet = $pet;
    }

    public function save(array $input)
    {
        $validated = Validator::make($input, $this->rules)->validateWithBag('save');

        if (isset($input['proof'])) {
            $path = $input['proof']->store('proofs', 'vaccines');
            $data['proof'] = $path;
        }

        $data['rabies'] = $validated['has_rabies'] ? $validated['rabies'] : null;
        $data['bordetella'] = $validated['has_bordetella'] ? $validated['bordetella'] : null;
        $data['dhhp'] = $validated['has_dhhp'] ? $validated['dhhp'] : null;

        Vaccine::updateOrCreate(['pet_id' => $this->pet->id], $data);
    }

    public function removeProof(string $file_name)
    {
        if (Storage::disk('vaccines')->exists($file_name)) {
            Storage::disk('vaccines')->delete($file_name);
        }

        $this->pet->vaccines->forceFill([
            'proof' => null,
        ])->save();
    }

    private function isNotAEmptyData($data)
    {
        return $data['has_rabies'] || $data['has_bordetella'] || $data['has_dhhp'] || isset($data['proof']);
    }
}
