<?php

namespace Tests\Feature\Models;

use App\Models\EmergencyContact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmergencyContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_emergency_contact_has_many_users()
    {
        $emergency_contact = EmergencyContact::factory()
            ->hasUsers()
            ->create();

        $this->assertInstanceOf(HasMany::class, $emergency_contact->users());

        $this->assertInstanceOf(
            User::class,
            $emergency_contact->users->first()
        );
    }
}
