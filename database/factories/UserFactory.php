<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use App\ValueObjects\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

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
            //"emergency_contact_id" => \App\Models\EmergencyContact::factory(),
            "password" =>
                '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            "remember_token" => Str::random(10),
            "area_code" => $this->faker->randomNumber(3),
            "phone_number" => $this->faker->randomNumber(9, true),
            "address" => new Address(
                $this->faker->randomNumber(4, true),
                $this->faker->streetName(),
                $this->faker->randomNumber(3, true),
                $this->faker->streetName()
            ),
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

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (!Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()->state(function (array $attributes, User $user) {
                return [
                    "name" => $user->name . '\'s Team',
                    "user_id" => $user->id,
                    "personal_team" => true,
                ];
            }),
            "ownedTeams"
        );
    }
}
