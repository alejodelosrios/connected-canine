<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Str;
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

        $input['phone_number'] = Str::of($input['phone_number'])->replaceMatches('/[^0-9]++/', '')->__toString();

        Validator::make(
            $input,
            [
                "name" => ["required", "string", "max:25"],
                "lastname" => ["required", "string", "max:25"],
                "email" => [
                    "required",
                    "email",
                    "max:255",
                    Rule::unique("users")->ignore($user->id),
                ],
                "photo" => ["nullable", "mimes:jpg,jpeg,png", "max:1024"],
                "phone_number" => [
                    "required",
                    "numeric",
                    "digits:10",
                ],
                "address.home_street" => [
                    "required",
                    "numeric",
                    "digits_between:2,6",
                ],
                "address.street_address" => [
                    "required",
                    "string",
                    "min:5",
                    "max:250",
                ],
                "zip_code" => ["required", "string", "min:3", "max:6"],
                "state" => ["required", "string", "min:3", "max:80"],
            ],
            [],
            [
                "address.home_street" => "home street",
                "address.street_address" => "street address",
                'name' => 'first name',
                'lastname' => 'last name'
            ]
        )->validateWithBag("updateProfileInformation");

        if (isset($input["photo"])) {
            $user->updateProfilePhoto($input["photo"]);
        }

        if (
            $input["email"] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user
                ->forceFill([
                    "name" => $input["name"],
                    "email" => $input["email"],
                    "lastname" => $input["lastname"],
                    "phone_number" => $input["phone_number"],
                    "state" => $input["state"],
                    "address" => new Address(
                        $input["address"]["home_street"],
                        $input["address"]["street_address"]
                    ),
                    "zip_code" => $input["zip_code"],
                ])
                ->save();
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
        $user
            ->forceFill([
                "name" => $input["name"],
                "email" => $input["email"],
                "email_verified_at" => null,
            ])
            ->save();

        $user->sendEmailVerificationNotification();
    }
}
