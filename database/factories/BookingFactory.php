<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pet_id' => \App\Models\Pet::factory(),
            'date' => now()->addDays(rand(1, 7))->hour(rand(8, 16))->minute(0)->second(0)
        ];
    }
}
