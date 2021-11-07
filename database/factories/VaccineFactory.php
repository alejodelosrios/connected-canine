<?php

namespace Database\Factories;

use App\Models\Vaccine;
use Illuminate\Database\Eloquent\Factories\Factory;

class VaccineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vaccine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pet_id' => \App\Models\Pet::factory(),
            'rabies' => now()->addMonth(),
            'bordetella' => now()->addMonth(),
            'dhhp' => now()->addMonth(),
        ];
    }

    public function expired()
    {
        return $this->state(function (array $attributes) {
            return [
                'rabies' => now()->subDay(),
                'bordetella' => now()->subDay(),
                'dhhp' => now()->subDay(),
            ];
        });
    }
}
