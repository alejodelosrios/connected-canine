<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::factory()
            ->hasPets()
            ->create([
                "name" => "Connected",
                "latname" => "Admin",
                "email" => "test@test.com",
            ]);

        \App\Models\Service::factory()->create([
            "name" => "Dog walking",
        ]);

        $this->call([
            PermissionsSeeder::class,
            BehavioralBackgroundSeeder::class,
            BehaviorSeparationConfinementSeeder::class,
            BehaviorAggressionFearSeeder::class,
        ]);
        $user->assignRole("Admin");
    }
}
