<?php

namespace Database\Factories;

use App\Models\Behavior;
use Illuminate\Database\Eloquent\Factories\Factory;

class BehaviorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Behavior::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->word()
        ];
    }
}
