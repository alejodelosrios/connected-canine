<?php

namespace Tests\Feature\Models;

use App\Models\Pet;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    /** @test */
    public function it_can_check_if_a_pet_has_a_booking()
    {
        //with booking pending
        $pet = Pet::withoutEvents(function () {
            return Pet::factory()
                ->hasBookings()
                ->create();
        });

        $this->assertTrue($pet->hasBooking());

        //with booking accepted
        $pet = Pet::withoutEvents(function () {
            return Pet::factory()
                ->hasBookings([
                    "status" => \App\Models\Booking::ACCEPTED,
                ])
                ->create();
        });

        $this->assertTrue($pet->hasBooking());
    }

    /** @test */
    public function it_can_check_if_a_pet_has_a_booking_with_status_cancelled()
    {
        $pet = Pet::withoutEvents(function () {
            return Pet::factory()
                ->hasBookings([
                    "status" => \App\Models\Booking::CANCELLED,
                ])
                ->create();
        });

        $this->assertFalse($pet->hasBooking());
    }

    /** @test */
    public function it_can_check_if_a_pet_has_not_a_booking()
    {
        //without a reservation already passed
        $pet = Pet::factory()->create();

        $this->assertFalse($pet->hasBooking());

        //with a reservation already passed
        $pet = Pet::withoutEvents(function () {
            return Pet::factory()
                ->hasBookings(["date" => now()->subDays(7)])
                ->create();
        });

        $this->assertFalse($pet->hasBooking());
    }

    /** @test */
    public function a_pet_can_have_a_boarding_history()
    {
        $pet = Pet::factory()->hasBoardingHistory()->create();

        $this->assertInstanceOf(HasOne::class, $pet->boardingHistory());
        $this->assertInstanceOf(
            \App\Models\BoardingHistory::class,
            $pet->boardingHistory
        );
    }

    /** @test */
    public function a_pet_can_have_medications()
    {
        $pet = Pet::factory()->create();

        $this->assertInstanceOf(HasMany::class, $pet->medications());
        $this->assertInstanceOf(
            "Illuminate\Database\Eloquent\Collection",
            $pet->medications
        );
    }

    /** @test */
    public function it_has_vaccines()
    {
        $pet = Pet::factory()->hasVaccines()->create();

        $this->assertInstanceOf(HasOne::class, $pet->vaccines());
        $this->assertInstanceOf(\App\Models\Vaccine::class, $pet->vaccines);
    }
}
