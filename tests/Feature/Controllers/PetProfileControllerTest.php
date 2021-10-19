<?php

namespace Tests\Feature\Controllers;

use App\Models\Pet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PetProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function pet_profile_screen_can_be_rendered()
    {
        $pet = Pet::factory()->create();
        $this->actingAs($pet->owner);

        $response = $this->get(route('pet-profile', $pet));

        $response->assertStatus(200);
    }

    /** @test */
    public function only_auth_user_can_be_access_to_pet_profile()
    {
        $pet = Pet::factory()->create();

        $response = $this->get(route('pet-profile', $pet));

        $response->assertRedirect();
    }
}
