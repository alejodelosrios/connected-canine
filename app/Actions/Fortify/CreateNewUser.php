<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\ValueObjects\Address;
use Laravel\Jetstream\Jetstream;
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
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'lastname' => $input['lastname'],
            'area_code' => $input['area_code'],
            'phone_number' => $input['phone_number'],
            'address' => new Address(
                $input['home_street'],
                $input['street_address'],
                $input['home_street_line_2'],
                $input['street_address_2']
            ),
            'accept_terms' => $input['accept_terms'],
            'aggreement' => $input['aggreement'],
            'zip_code' => $input['zip_code'],
        ]);
    }
}
