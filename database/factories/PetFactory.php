<?php

namespace Database\Factories;

use App\Models\Breed;
use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => \App\Models\User::factory(),
            "veterinarian_id" => \App\Models\Veterinarian::factory(),
            "name" => $this->faker->firstName(),
            "birthday" => now()
                ->subMonths(rand(1, 120))
                ->format("Y-m-d"),
            "sex" => $this->faker->randomElement(["male", "female"]),
            "weight" => $this->faker->randomFloat(2, 100, 500),
            "breed_id" => function ($atr) {
                $breeds = Breed::all();
                if ($breeds->count()) {
                    return $breeds->random();
                }
                return Breed::factory();
            },
            "question" => $this->faker->randomElement(["yes", "no"]),
            "parasite_control" => $this->faker->randomElement(["yes", "no"]),
        ];
    }
}
