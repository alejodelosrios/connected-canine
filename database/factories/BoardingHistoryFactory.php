<?php

namespace Database\Factories;

use App\Models\BoardingHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoardingHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BoardingHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pet_id' => \App\Models\Pet::factory(),
            'attended' => true,
            'scuffle_event' => $this->faker->boolean(),
            'scuffle_description' => fn ($attribute) => !$attribute['scuffle_event'] ?: $this->faker->text(),
            'forbidden_assistance' => $this->faker->boolean(),
            'accomodations' => $this->faker->boolean(),
            'accomodations_description' => fn ($attribute) => !$attribute['accomodations'] ?: $this->faker->text(),
            'comments' => $this->faker->boolean() ?: $this->faker->text(),
        ];
    }
}
