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
        //01
        Behavior::factory()->create([
            'name' => 'Reach out to pet your dog',
            'description' => 'Dog behavior vs behavior of unfamiliar peopel',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Approach your dog while resting',
            'description' => 'Dog behavior vs behavior of unfamiliar peopel',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => ' Approach you',
            'description' => 'Dog behavior vs behavior of unfamiliar peopel',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => ' Enter you home',
            'description' => 'Dog behavior vs behavior of unfamiliar peopel',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Are seen through a window',
            'description' => 'Dog behavior vs behavior of unfamiliar peopel',
            'type' => 'aggression_fear'
        ]);

        // 02
        Behavior::factory()->create([
            'name' => 'Is on leash',
            'description' => 'Behavior when unfamiliar peaople approach',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Is off leash',
            'description' => 'Behavior when unfamiliar peaople approach',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Has a food',
            'description' => 'Behavior when unfamiliar peaople approach',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Has a toy',
            'description' => 'Behavior when unfamiliar peaople approach',
            'type' => 'aggression_fear'
        ]);

        // 03
        Behavior::factory()->create([
            'name' => 'Man (18+ years old)',
            'description' => 'Behavior When dog is around an unfamiliar people',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Woman (18+ years old)',
            'description' => 'Behavior When dog is around an unfamiliar people',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Child (0-17 years old)',
            'description' => 'Behavior When dog is around an unfamiliar people',
            'type' => 'aggression_fear'
        ]);

        // 04
        Behavior::factory()->create([
            'name' => 'Approach your dog',
            'description' => 'Behavior of the dog versus the behavior of another',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Approach you',
            'description' => 'Behavior of the dog versus the behavior of another',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Are seen through a window',
            'description' => 'Behavior of the dog versus the behavior of another',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Cross paths with your dog while out walking',
            'description' => 'Behavior of the dog versus the behavior of another',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Cross paths with your dog near a doorway',
            'description' => 'Behavior of the dog versus the behavior of another',
            'type' => 'aggression_fear'
        ]);

        // 05
        Behavior::factory()->create([
            'name' => 'Is on leash',
            'description' => 'Behavior when unfamiliar dogs approach',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Is off leash',
            'description' => 'Behavior when unfamiliar dogs approach',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Has a food',
            'description' => 'Behavior when unfamiliar dogs approach',
            'type' => 'aggression_fear'
        ]);

        Behavior::factory()->create([
            'name' => 'Has a toy',
            'description' => 'Behavior when unfamiliar dogs approach',
            'type' => 'aggression_fear'
        ]);

        //6
        Behavior::factory()->create([
            'name' => 'Does your dog exhibit any of these behaviors when meeting new people? Please select all that apply.',
            'description' => 'Behavior when meeting new people',
            'type' => 'aggression_fear'
        ]);

        //7
        Behavior::factory()->create([
            'name' => 'Does your dog exhibit any of these behaviors when meeting new dogs? Please select all that apply.',
            'description' => 'Behavior when meeting new dog',
            'type' => 'aggression_fear'
        ]);
        //8
        Behavior::factory()->create([
            'name' => 'If your dog has ever bitten a person, how many times has this occured?',
            'description' => 'Bitten person count',
            'type' => 'aggression_fear'
        ]);
        //9
        Behavior::factory()->create([
            'name' => 'If your dog has ever bitten a dog, how many times has this occured?',
            'description' => 'Bitten dog count',
            'type' => 'aggression_fear'
        ]);
    }
}
