<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::make(
            $input,
            [
                "name" => ["required", "string", "max:255"],
                "lastname" => ["required", "string", "max:25"],
                "email" => ["required", "string", "email", "max:255", "unique:users",],
                "password" => $this->passwordRules(),
                "terms" => ["required", "accepted"],
            ],
            [
                'terms.*' => 'Please indicate that you have read and agree to the Terms of Use and Privacy Policy'
            ],
            [
                'name' => 'first name',
                'lastname' => ' last name'
            ]
        )->validate();

        return User::create([
            "name" => $input["name"],
            "lastname" => $input["lastname"],
            "email" => $input["email"],
            "password" => Hash::make($input["password"]),
            "accept_terms" => now(),
        ])->assignRole("Employee");
    }
}
