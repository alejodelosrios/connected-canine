<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WizardProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function wizard_profile_screen_can_be_rendered()
    {
        $this->actingAs($user = \App\Models\User::factory()->create());

        $response = $this->get(route('wizard.profile',1));

        $response->assertStatus(200);
        $response->assertViewIs('wizard.profile-wizard-screen');
        $response->assertViewHas(['user' => $user]);
    }

    /** @test */
    public function only_registered_user_can_access_to_wizard_profile_screen()
    {
        $user = \App\Models\User::factory()->create();

        $response = $this->get(route('wizard.profile',1));

        $response->assertRedirect();
    }
}
