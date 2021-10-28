<?php

namespace Tests\Feature\Models;

use App\Models\EmergencyContact;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_pet_belongs_to_user()
    {
        $user = User::factory()
            ->hasPets()
            ->create();

        $this->assertInstanceOf(HasMany::class, $user->pets());

        $this->assertInstanceOf(\App\Models\Pet::class, $user->pets->first());
    }

    /** @test */
    public function a_user_belongs_to_an_emergency_contact()
    {
        $user = User::factory()->create();

        $this->assertInstanceOf(BelongsTo::class, $user->emergency_contact());

        $this->assertInstanceOf(
            EmergencyContact::class,
            $user->emergency_contact
        );
    }
}
