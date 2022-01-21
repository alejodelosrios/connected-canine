<?php

namespace Database\Factories;

use App\Models\Medication;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word(),
            "status" => $this->faker->randomElement(["Active", "Inactive"]),
            "frequency" => $this->faker->randomElement([
                "Hourly",
                "Daily",
                "Monthly",
            ]),
            "time_block" => $this->faker->randomElement([
                "Morning",
                "Afternoon",
                "Evening",
            ]),
            "purpose" => $this->faker->sentence(),
            "prescription" => $this->faker->randomElement(["Yes", "No"]),
        ];
    }
}
