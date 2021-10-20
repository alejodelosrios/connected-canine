<?php

namespace Tests\Feature\Models;

use App\Models\Pet;
use App\Models\Veterinarian;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VeterinarianTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_vet_has_many_pets()
    {
        $vet = Veterinarian::factory()
            ->hasPets()
            ->create();

        $this->assertInstanceOf(HasMany::class, $vet->pets());

        $this->assertInstanceOf(Pet::class, $vet->pets->first());
    }
}
