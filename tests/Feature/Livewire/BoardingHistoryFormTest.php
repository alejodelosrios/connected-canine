<?php

namespace Tests\Feature\Livewire;

use App\Models\Pet;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\BoardingHistoryForm;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BoardingHistoryFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_boarding_history_for_a_pet()
    {
        $pet = Pet::factory()->create();
        $this->actingAs($pet->owner);

        Livewire::test(BoardingHistoryForm::class, ['pet' => $pet])
            ->set('state', [
                'pet_id' => $pet->id,
                'attended' => true,
                'scuffle_event' => true,
                'scuffle_description' => 'scuffle fake description',
                'forbidden_assistance' => true,
                'accomodations' => true,
                'accomodations_description' => 'accomodation fake description',
                'comments' => 'fake comments',
            ])->call('save');

        $this->assertDatabaseCount('boarding_histories', 1);

        $this->assertTrue($pet->refresh()->hasBoardingHistory());
    }

    /** @test */
    public function it_can_display_on_screen_a_boarding_history_for_a_pet()
    {
        $pet = Pet::factory()->hasBoardingHistory()->create();
        $this->actingAs($pet->owner);

        $boardingHistory = $pet->boardingHistory->toArray();

        Livewire::test(BoardingHistoryForm::class, ['pet' => $pet])
            ->assertSet('state.attended', true)
            ->assertSet('state.scuffle_event', $boardingHistory['scuffle_event'])
            ->assertSet('state.scuffle_description', $boardingHistory['scuffle_description'])
            ->assertSet('state.forbidden_assistance', $boardingHistory['forbidden_assistance'])
            ->assertSet('state.accomodations', $boardingHistory['accomodations'])
            ->assertSet('state.accomodations_description', $boardingHistory['accomodations_description'])
            ->assertSet('state.comments', $boardingHistory['comments']);
    }
}
