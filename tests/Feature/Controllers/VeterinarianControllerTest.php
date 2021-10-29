<?php

namespace Tests\Feature\Controllers;

use App\Models\Pet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VeterinarianControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function veterinarian_screen_can_be_rendered()
    {
        $pet = Pet::factory()->create();
        $vet = $pet->owner;
        $this->actingAs($vet);

        $response = $this->get(route("veterinarian", [$pet, $vet]));

        $response->assertStatus(200);
    }

    /** @test */
    public function only_auth_user_can_be_access_to_veterinarian()
    {
        $pet = Pet::factory()->create();
        $vet = $pet->owner;

        $response = $this->get(route("veterinarian", [$pet, $vet]));

        $response->assertRedirect();
    }
}
