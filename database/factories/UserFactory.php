<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\ValueObjects\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->firstName(),
            "lastname" => $this->faker->lastName(),
            "email" => $this->faker->unique()->safeEmail(),
            "email_verified_at" => now(),
            "password" =>
            '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            "remember_token" => Str::random(10),
            "phone_number" => '1234567890',
            "address" => function ($attributes) {
                $home_street = $this->faker->randomNumber(4, true);
                $street_address = $this->faker->streetName();
                $home_street_2 = $this->faker->randomNumber(3, true);
                $street_address_2 = $this->faker->streetName();
                return new Address($home_street, $street_address, $home_street_2, $street_address_2);
            },
            "zip_code" => "3023",
            "accept_terms" => now(),
            "aggreement" => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                "email_verified_at" => null,
            ];
        });
    }
}
