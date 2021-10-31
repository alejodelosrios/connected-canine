<?php

namespace Database\Seeders;

use App\Models\Behavior;
use Illuminate\Database\Seeder;

class BehaviorAggressionFearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Behavior::factory()->create([
            'name' => 'How relaxed or stressed is your dog when unfamiliar people...',
            'description' => 'relaxed or stressed behavior',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'How relaxed or stressed is your dog when infamilliar people approach and your dog...',
            'description' => 'relaxed or stressed behavior',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'How relaxed or stressed is your dog around an unfamiliar person who is a...',
            'description' => 'relaxed or stressed behavior',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'How relaxed or stressed is your dog when unfamiliar dogs...',
            'description' => 'relaxed or stressed behavior',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'How relaxed or stressed is your dog when unfamiliar dogs approach and your dog...',
            'description' => 'relaxed or stressed behavior',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Does your dog exhibit any of these behaviors when meeting new people? Please select all tha apply.',
            'description' => 'relaxed or stressed behavior',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Does your dog exhibit any of these behaviors when meeting new dogs? Please select all tha apply.',
            'description' => 'relaxed or stressed behavior',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'If your dog has ever bitten a person, how many times has this occurred? If never, enter "0".',
            'description' => 'relaxed or stressed behavior',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'If your dog has ever bitten another person, how many times has this occurred? If never, enter "0".',
            'description' => 'relaxed or stressed behavior',
            'type' => 'aggression_fear'
        ]);
    }
}
