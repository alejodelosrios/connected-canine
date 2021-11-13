<?php

namespace Database\Seeders;

use App\Models\Behavior;
use Illuminate\Database\Seeder;

class BehaviorSeparationConfinementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Behavior::factory()->create([
            "name" =>
                "Does your dog exhibit any of the following behaviors when separated from you in an unfamiliar location. Please select all the apply.",
            "description" =>
                "behaviors when separated from you in an unfamiliar location",
            "type" => "separation_confinement",
        ]);

        Behavior::factory()->create([
            "name" =>
                "Can your pet be created without vocalizing or otherwise acting distressed?",
            "description" => "pet can be crated",
            "type" => "separation_confinement",
        ]);
    }
}
