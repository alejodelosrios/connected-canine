<?php

namespace Tests\Feature\Models;

use App\Models\Pet;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_pet_belongs_to_user()
    {
        $pet = Pet::factory()->create();

        $this->assertInstanceOf(BelongsTo::class, $pet->owner());

        $this->assertInstanceOf(\App\Models\User::class, $pet->owner);
    }
}
