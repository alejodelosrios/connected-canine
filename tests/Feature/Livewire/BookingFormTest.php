<?php

namespace Tests\Feature\Livewire;

use App\Models\Pet;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\BookingForm;
use App\Notifications\BookingRequest;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test*/
    public function it_can_render_pets_list()
    {
        $user = \App\Models\User::factory()->hasPets()->create();
        $this->actingAs($user);

        Livewire::test(BookingForm::class)
            ->assertViewHas('pets', $user->pets);
    }

    /** @test*/
    public function it_can_create_a_book()
    {
        Notification::fake();

        $user = \App\Models\User::factory()->hasPets()->create();
        $this->actingAs($user);

        Livewire::test(BookingForm::class)
            ->set('state', [
                'pet_id' => $user->pets->first()->id,
                'date' => now()->addDays(3)->format('d-m-Y')
            ])
            ->call('save')
            ->assertEmitted('saved')
            ->assertEmitted('refresh-navigation-menu');

        $this->assertDatabaseCount('bookings', 1);

        Notification::assertSentTo(
            [$user],
            BookingRequest::class
        );
    }

    /**
     * @test
     * @dataProvider invalidDataProvider
     */
    public function it_can_create_a_book_with_valid_data($campo, $value, $error)
    {
        $user = \App\Models\User::factory()->hasPets()->create();
        $this->actingAs($user);

        Livewire::test(BookingForm::class)
            ->set('state', [$campo => $value])
            ->call('save')
            ->assertHasErrors($campo, $error);
    }

    public function invalidDataProvider()
    {
        $today = now();
        return [
            'with empty pet id' => ['pet_id', '', 'required'],
            'with empty date' => ['date', '', 'required'],
            'with today\'s date' => ['date', $today->format('d-m-Y'), 'after'],
            'with date before today' => ['date', $today->subDay()->format('d-m-Y'), 'after'],
            'with non-existent pet' => ['pet_id', 2, 'exists']
        ];
    }

    public function a_user_cannot_create_a_book_for_another_user_pet()
    {
        $user = \App\Models\User::factory()->hasPets()->create();
        $this->actingAs($user);

        $response = Livewire::test(BookingForm::class)
            ->set('state', [$campo => $value])
            ->call('save');
    }

    /** @test */
    public function user_cannot_request_a_book_if_there_is_a_pending()
    {

        $pet = Pet::withoutEvents(function () {
            return  Pet::factory()->hasBookings()->create();
        });

        $this->actingAs($pet->owner);

        Livewire::test(BookingForm::class)
            ->set('state', [
                'pet_id' => $pet->id,
                'date' => now()->addDays(3)->format('d-m-Y')
            ])
            ->call('save')
            ->assertHasErrors('pet_id');

        $this->assertDatabaseCount('bookings', 1);
    }

    /** @test */
    public function user_can_request_a_book_if_there_is_a_already_passed_booking()
    {
        Notification::fake();
        $pet = Pet::withoutEvents(function () {
            return  Pet::factory()->hasBookings(['date' => now()->subDay(7)])->create();
        });

        $this->actingAs($pet->owner);

        Livewire::test(BookingForm::class)
            ->set('state', [
                'pet_id' => $pet->id,
                'date' => now()->addDays(3)->format('d-m-Y')
            ])
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseCount('bookings', 2);
    }
}
