<?php

namespace Tests\Feature\Controllers;

use App\Models\Medication;
use App\Models\Pet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedicationControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function medications_screen_can_be_rendered()
    {
        $pet = Pet::factory()->create();
        $this->actingAs($pet->owner);

        $response = $this->get(route("pet.medications", $pet));

        $response->assertStatus(200);
    }

    /** @test */
    public function only_auth_user_can_be_access_to_medications()
    {
        $pet = Pet::factory()->create();

        $response = $this->get(route("pet.medications", $pet));

        $response->assertRedirect();
    }

    /** @test */
    public function a_medication_can_be_deleted()
    {
        $pet = Pet::factory()
            ->has(Medication::factory()->count(1))
            ->create();
        $medication = $pet->medications->first();
        $this->actingAs($pet->owner);

        $this->assertDatabaseCount("medications", 1);
        $this->get(route("pet.medication-delete", [$pet, $medication]));
        $this->assertDatabaseCount("medications", 0);
    }
}
