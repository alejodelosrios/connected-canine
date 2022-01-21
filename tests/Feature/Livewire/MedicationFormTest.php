<?php

namespace Tests\Feature\Livewire;

use App\Models\Pet;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\MedicationForm;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
            ])->call("save");

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

        $this->assertDatabaseCount("medications", 1);

        $this->assertDatabaseHas("medications", [
            "pet_id" => $pet->id,
        ]);
    }

    /** @test */
    public function it_can_display_on_update_screen_a_medication_for_a_pet()
    {
        $pet = Pet::factory()
            ->hasMedications(1, [
                "name" => "Test medication",
                "status" => true,
                "frequency" => "Daily",
                "time_block" => "Morning",
                "purpose" => "Medication purpose",
                "prescription" => true,
            ])
            ->create();
        $medication = $pet->medications->first();

        $this->actingAs($pet->owner);

        $response = $this->get(
            route("pet.medication-update", [$pet, $medication])
        );

        $response->assertStatus(200);

        $view = $this->view("pet.medication-update", [
            "pet" => $pet,
            "medication" => $medication,
        ]);

        $view->assertSee($medication->name);
        $view->assertSee($medication->status);
        $view->assertSee($medication->frequency);
        $view->assertSee($medication->time_block);
        $view->assertSee($medication->purpose);
        $view->assertSee($medication->prescription);
        $view->assertSee($medication->dosage);
        $view->assertSee($medication->instructions);

        //Livewire::test(MedicationForm::class, ["pet" => $pet])
        //->assertSet("state.name", $medication->name)
        //->assertSet("state.status", $medication->status)
        //->assertSet("state.frequency", $medication->frequency)
        //->assertSet("state.time_block", $medication->time_block)
        //->assertSet("state.purpose", $medication->purpose)
        //->assertSet("state.prescription", $medication->prescription)
        //->assertSet("state.dosage", $medication->dosage)
        //->assertSet("state.instructions", $medication->instructions);
    }

    /** @test */
    public function a_medication_can_be_edited()
    {
        $pet = Pet::factory()
            ->hasMedications()
            ->create();
        $medication = $pet->medications->first();
        $this->actingAs($pet->owner);

        Livewire::test(MedicationForm::class, [$pet, $medication])
            ->set("state", [
                "pet_id" => $pet->id,
                "name" => "Other name",
            ])
            ->call("save")
            ->assertSet('state.name', "Other name");
        $pet->refresh();
    }
}
