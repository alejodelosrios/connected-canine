<?php

namespace Tests\Feature\Models;

use App\Models\Pet;
use App\Models\Veterinarian;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    /** @test */
    public function a_pet_belongs_to_a_veterinarian()
    {
        $pet = Pet::factory()->create();

        $this->assertInstanceOf(BelongsTo::class, $pet->veterinarian());

        $this->assertInstanceOf(Veterinarian::class, $pet->veterinarian);
    }
}
