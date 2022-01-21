<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\Medication;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MedicationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_medications_can_be_in_many_pets()
    {
        $medication = Medication::factory()->create();

        $this->assertInstanceOf(BelongsTo::class, $medication->pet());
    }
}
