<?php

namespace Tests\Feature\Livewire;

use App\Models\Pet;
use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Http\UploadedFile;
use App\Http\Livewire\VaccineForm;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VaccineFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_add_vaccine_to_a_pet()
    {
        $pet = Pet::factory()->create();

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
    public function it_does_not_add_if_user_does_not_choose_any_vaccine()
    {
        $pet = Pet::factory()->create();

        Livewire::test(VaccineForm::class, ['pet' => $pet])
            ->call('save');

        $this->assertDatabaseCount('vaccines', 0);
    }

    /** @test */
    public function vaccine_expiration_dates_must_be_after_today()
    {
        $pet = Pet::factory()->create();

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

    /** @test */
    public function it_can_upload_proof()
    {
        Storage::fake('vaccines');

        $pet = Pet::factory()->create();
        $file = UploadedFile::fake()->create('proof.pdf');

        Livewire::test(VaccineForm::class, ['pet' => $pet])
            ->set('state.proof', $file)
            ->call('save');

        Storage::disk('vaccines')->assertExists('proof_1.pdf');
    }

    /** @test */
    public function it_can_remove_an_uploaded_proof()
    {
        Storage::fake('vaccines');

        $pet = Pet::factory()->hasVaccines(['proof' => 'proof_1.pdf'])->create();
        $file = UploadedFile::fake()->create('proof.pdf');
        Storage::disk('vaccines')->put('proof_1.pdf', $file);

        $response = Livewire::test(VaccineForm::class, ['pet' => $pet])
            ->assertSet('state.proof', 'proof_1.pdf')
            ->call('removeProof');

        $response->assertSet('state.proof', null);;
        $this->assertNull($pet->refresh()->proof);
        Storage::assertMissing('proof_1.pdf');
    }
}