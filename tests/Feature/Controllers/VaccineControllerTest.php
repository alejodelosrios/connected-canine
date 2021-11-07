<?php

namespace Tests\Feature\Controllers;

use App\Models\Pet;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VaccineControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function if_can_display_vaccine_screen()
    {
        $pet = Pet::factory()->create();

        $this->actingAs($pet->owner);
        $response = $this->get(route('vaccines', $pet));

        $response->assertStatus(200);
    }

    /** @test */
    public function only_auth_user_can_access_to_this_view()
    {
        $pet = Pet::factory()->create();

        $response = $this->get(route('vaccines', $pet));

        $response->assertRedirect();
    }

    /** @test */
    public function only_owner_user_can_access_to_this_view()
    {
        $pet = Pet::factory()->create();
        $this->actingAs(\App\Models\User::factory()->create());

        $response = $this->get(route('vaccines', $pet));

        $response->assertForbidden();
    }
}
