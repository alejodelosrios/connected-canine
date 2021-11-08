<?php

namespace Tests\Feature\Models;

use App\Models\Pet;
use Tests\TestCase;
use App\Models\Vaccine;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VaccinesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_check_if_a_vaccine_is_up_to_date()
    {
        $pet = Pet::factory()->hasVaccines()->create();

        $this->assertTrue($pet->vaccines->isUpToDate('rabies'));
        $this->assertTrue($pet->vaccines->isUpToDate('bordetella'));
        $this->assertTrue($pet->vaccines->isUpToDate('dhhp'));
    }

    /** @test */
    public function it_can_check_if_a_vaccine_has_expired()
    {
        $pet = Pet::factory()->has(Vaccine::factory()->expired())->create();

        $this->assertFalse($pet->vaccines->isUpToDate('rabies'));
        $this->assertFalse($pet->vaccines->isUpToDate('bordetella'));
        $this->assertFalse($pet->vaccines->isUpToDate('dhhp'));
    }
}
