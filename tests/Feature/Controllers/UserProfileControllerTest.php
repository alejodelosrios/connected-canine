<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_profile_screen_can_be_rendered()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('user.profile'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.user-profile');
        $response->assertViewHas('user', $user);
    }

    /** @test */
    public function only_auth_user_can_access_to_profile_screen()
    {
        $response = $this->get(route('user.profile'));

        $response->assertRedirect('login');
    }
}
