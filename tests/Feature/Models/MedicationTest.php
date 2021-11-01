<?php

namespace Tests\Feature\Models;

use App\Models\Medication;
use App\Models\Pet;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MedicationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_medications_can_be_in_many_pets()
    {
        $medication = Medication::factory()->create();

        $this->assertInstanceOf(BelongsToMany::class, $medication->pets());
        $this->assertInstanceOf(
            "Illuminate\Database\Eloquent\Collection",
            $medication->pets
        );
    }
}
