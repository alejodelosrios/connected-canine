<?php

namespace Database\Factories;

use App\Models\Veterinarian;
use Illuminate\Database\Eloquent\Factories\Factory;

class VeterinarianFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Veterinarian::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "vet_clinic" => $this->faker->company,
            "vet_address" => $this->faker->address,
            "vet_phone_number" => $this->faker->numberBetween(
                1000000000,
                9999999999
            ),
        ];
    }
}
