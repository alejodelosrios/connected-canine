<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\MedicationForm;
use App\Models\Medication;
use App\Models\Pet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class MedicationFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_medication()
    {
        $pet = Pet::factory()->create();
        $this->actingAs($pet->owner);

        Livewire::test(MedicationForm::class, ["pet" => $pet])
            ->set("state", [
                "pet_id" => $pet->id,
                "name" => "Medication name",
                "status" => true,
                "frequency" => "Daily",
                "time_block" => "Morning",
                "purpose" => "Medication purpose",
                "prescription" => true,
                "dosage" => "Medication dosage",
                "instructions" => "Medication instructions",
            ])
            ->call("save");

        $this->assertDatabaseCount("medications", 1);

        $this->assertTrue($pet->refresh()->hasMedications());
    }

    /** @test */
    public function it_can_attach_a_medication_to_a_pet()
    {
        $pet = Pet::factory()->create();
        $this->actingAs($pet->owner);

        Livewire::test(MedicationForm::class, ["pet" => $pet])
            ->set("state", [
                "pet_id" => $pet->id,
                "name" => "Medication name",
                "status" => true,
                "frequency" => "Daily",
                "time_block" => "Morning",
                "purpose" => "Medication purpose",
                "prescription" => true,
                "dosage" => "Medication dosage",
                "instructions" => "Medication instructions",
            ])
            ->call("save");

        $this->assertDatabaseCount("medication_pet", 1);

        $this->assertDatabaseHas("medication_pet", [
            "status" => true,
            "frequency" => "Daily",
            "time_block" => "Morning",
            "purpose" => "Medication purpose",
            "prescription" => true,
            "dosage" => "Medication dosage",
            "instructions" => "Medication instructions",
        ]);
    }

    /** @test */
    public function it_can_display_on_screen_a_medication_for_a_pet()
    {
        $medication = Medication::factory()->create();
        $pet = Pet::factory()
            ->hasAttached($medication, [
                "status" => true,
                "frequency" => "Daily",
                "time_block" => "Morning",
                "purpose" => "Medication purpose",
                "prescription" => true,
                "dosage" => "Medication dosage",
                "instructions" => "Medication instructions",
            ])
            ->create();

        $this->actingAs($pet->owner);

        $pet_medication = $pet->medications->toArray();

        //dd($pet_medication);

        Livewire::test(MedicationForm::class, ["pet" => $pet])
            ->assertSet("state.name", $medication->name)
            ->assertSet("state.status", $pet_medication["status"])
            ->assertSet("state.frequency", $pet_medication["frequency"])
            ->assertSet("state.time_block", $pet_medication["time_block"])
            ->assertSet("state.purpose", $pet_medication["purpose"])
            ->assertSet("state.prescription", $pet_medication["prescription"])
            ->assertSet("state.dosage", $pet_medication["dosage"])
            ->assertSet("state.instructions", $pet_medication["instructions"]);
    }
}
