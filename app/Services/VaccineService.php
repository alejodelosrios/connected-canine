<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Vaccine;
use Illuminate\Validation\Rule;
use App\Contracts\UpdaterContract;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

final class VaccineService implements UpdaterContract
{
    protected $rules = [
        'has_rabies' => ['required', 'boolean'],
        'rabies' => ['required_if:has_rabies,true', 'nullable', 'after:today'],
        'has_bordetella' => ['required', 'boolean'],
        'bordetella' => ['required_if:has_bordetella,true', 'nullable', 'after:today'],
        'has_dhhp' => ['required', 'boolean'],
        'dhhp' => ['required_if:has_dhhp,true', 'nullable', 'after:today'],
        'proof' => ['nullable', 'file', 'mimes:png,jpg,pdf', 'max:102400']
    ];

    public function __construct(public \App\Models\Pet $pet)
    {
        //
    }

    public function save(array $input)
    {
        $validated = Validator::make($input, $this->rules)->validateWithBag('save');

        if ($this->isNotAEmptyData($validated)) {
            if (isset($input['proof'])) {
                $path = $input['proof']->store('proofs', 'vaccines');
                /* Storage::disk('vaccines')->put($file_name, $input['proof']); */
                $validated = array_merge($validated, ['proof' => $path]);
            }

            Vaccine::updateOrCreate(['pet_id' => $this->pet->id], [
                'rabies' => $validated['has_rabies'] ? $validated['rabies'] : null,
                'bordetella' => $validated['has_bordetella'] ? $validated['bordetella'] : null,
                'dhhp' => $validated['has_dhhp'] ? $validated['dhhp'] : null,
                'proof' => $validated['proof'] ?? null,
            ]);
        }
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
