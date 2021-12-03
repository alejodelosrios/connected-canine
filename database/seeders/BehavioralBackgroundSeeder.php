<?php

namespace Database\Seeders;

use App\Models\Behavior;
use Illuminate\Database\Seeder;

class BehavioralBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Behavior::factory()->create([
            "name" => "How often does your dog  come when called",
            "description" => "come when called",
            "type" => "background",
        ]);

        Behavior::factory()->create([
            "name" => "How often does your dog urinate or deficate indoors",
            "description" => "urinate or deficate indoors",
            "type" => "background",
        ]);

        Behavior::factory()->create([
            "name" => "Thunder",
            "description" => "appear distessed",
            "type" => "background",
        ]);

        Behavior::factory()->create([
            "name" => "Vacuums",
            "description" => "appear distessed",
            "type" => "background",
        ]);
    }
}
