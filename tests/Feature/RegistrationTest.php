<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\ValueObjects\Address;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_registration_screen_can_be_rendered()
    {
        if (!Features::enabled(Features::registration())) {
            return $this->markTestSkipped('Registration support is not enabled.');
        }

        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_registration_screen_cannot_be_rendered_if_support_is_disabled()
    {
        if (Features::enabled(Features::registration())) {
            return $this->markTestSkipped('Registration support is enabled.');
        }

        $response = $this->get('/register');

        $response->assertStatus(404);
    }

    public function test_new_users_can_register()
    {
        if (!Features::enabled(Features::registration())) {
            return $this->markTestSkipped('Registration support is not enabled.');
        }

        $response = $this->post('/register', [
            'name' => 'Test User',
            'lastname' => 'Lastname',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
            'area_code' => 123,
            'phone_number' => $this->faker->phoneNumber(),
            'home_street' => $this->faker->streetAddress(),
            'home_street_line_2' => $this->faker->streetAddress(),
            'street_address' => $this->faker->streetName(),
            'street_address_2' => $this->faker->streetName(),
            'zip_code' => $this->faker->randomNumber(3),
            'accept_terms' => now(),
            'aggreement' => now()
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
