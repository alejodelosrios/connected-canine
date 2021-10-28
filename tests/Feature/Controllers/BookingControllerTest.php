<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function booking_screen_can_be_rendered()
    {
        $user = \App\Models\User::factory()->hasPets()->create();
        $this->actingAs($user);

        $response = $this->get(route('bookings.create'));

        $response->assertStatus(200);
        $response->assertViewIs('booking.create');

    }

    /** @test */
    public function only_auth_user_can_access_to_booking_screen()
    {
        $response = $this->get(route('bookings.create'));

        $response->assertRedirect('login');
    }
}
