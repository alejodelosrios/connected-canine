<?php

namespace App\Services;

use App\Models\Pet;
use App\Contracts\UpdaterContract;
use Illuminate\Support\Facades\Validator;

final class PetProfile implements UpdaterContract
{
    public function save(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date_format:m-d-Y'],
            'sex' => ['required', 'string', 'in:male,female'],
            'weight' => ['required', 'numeric', 'min:1'],
            'color' => ['required', 'string', 'max:50'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('save');

        $pet = Pet::updateOrCreate(['id' => $input['id'] ?? ''], [
            'user_id' => auth()->id(),
            'name' => $input['name'],
            'birthday' => $input['birthday'],
            'sex' => $input['sex'],
            'weight' => $input['weight'],
            'color' => $input['color'],
        ]);

        if (isset($input['photo'])) {
            $pet->updateProfilePhoto($input['photo']);
        }
    }
}
