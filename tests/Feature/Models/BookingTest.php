<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_booking_belongs_to_many_services()
    {
        $booking = new \App\Models\Booking;

        $this->assertInstanceOf(BelongsToMany::class, $booking->services());
    }
    
}
