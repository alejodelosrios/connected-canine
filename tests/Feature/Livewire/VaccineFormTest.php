<?php

namespace Tests\Feature\Livewire;

use App\Models\Pet;
use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Http\UploadedFile;
use App\Http\Livewire\VaccineForm;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VaccineFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_add_vaccine_to_a_pet()
    {
        $pet = Pet::factory()->create();
        $this->actingAs($pet->owner);

        Livewire::test(VaccineForm::class, ['pet' => $pet])
            ->set('state', [
                'has_rabies' => true,
                'rabies' => now()->addMonth()->format('m/d/Y'),
                'has_bordetella' => true,
                'bordetella' => now()->addMonth()->format('m/d/Y'),
                'has_dhhp' => true,
                'dhhp' => now()->addMonth()->format('m/d/Y'),
            ])
            ->call('save');

        $this->assertDatabaseCount('vaccines', 1);
    }

    /** @test */
    public function vaccine_expiration_dates_must_be_after_today()
    {
        $pet = Pet::factory()->create();
        $this->actingAs($pet->owner);

        $response = Livewire::test(VaccineForm::class, ['pet' => $pet])
            ->set('state', [
                'has_rabies' => true,
                'rabies' => now()->subDay()->format('m/d/Y'),
                'has_bordetella' => true,
                'bordetella' => now()->subDay()->format('m/d/Y'),
                'has_dhhp' => true,
                'dhhp' => now()->subDay()->format('m/d/Y'),
            ])
            ->call('save');

        $response->assertHasErrors(['rabies', 'bordetella', 'dhhp']);
    }
}
