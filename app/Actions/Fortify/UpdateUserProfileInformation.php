<?php

namespace App\Actions\Fortify;

use App\ValueObjects\Address;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:25'],
            'lastname' => ['required', 'string', 'max:25'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'area_code' => ['required', 'numeric', 'digits_between:2,3'],
            'phone_number' => ['required', 'numeric', 'digits_between:8,20'],
            'address.home_street' => ['required', 'numeric', 'digits_between:2,6'],
            'address.home_street_2' => ['nullable', 'numeric', 'digits_between:2,6'],
            'address.street_address' => ['required', 'string', 'min:5', 'max:250'],
            'address.street_address_2' => ['nullable', 'string', 'min:5', 'max:250'],
            'zip_code' => ['required', 'string', 'min:3', 'max:6'],
        ], [], [
            'address.home_street' => 'home street',
            'address.home_street_2' => 'home street 2',
            'address.street_address' => 'street address',
            'address.street_address_2' => 'street address 2'
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'lastname' => $input['lastname'],
                'area_code' => $input['area_code'],
                'phone_number' => $input['phone_number'],
                'address' => new Address(
                    $input['address']['home_street'],
                    $input['address']['street_address'],
                    $input['address']['home_street_2'],
                    $input['address']['street_address_2']
                ),
                'zip_code' => $input['zip_code'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
