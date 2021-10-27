<?php

namespace Tests\Feature\Livewire;

use App\Models\Pet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use App\Http\Livewire\VeterinarianForm;
use App\Models\Veterinarian;
use Tests\TestCase;

class VeterinarianFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function current_veterinarian_is_available()
    {
        $pet = Pet::factory()->create();
        $this->actingAs($pet->owner);
        $vet = $pet->veterinarian;

        $component = Livewire::test(VeterinarianForm::class, [
            "pet" => $pet,
        ]);

        $this->assertEquals($vet->vet_clinic, $component->state["vet_clinic"]);
        $this->assertEquals(
            $vet->vet_address,
            $component->state["vet_address"]
        );
        $this->assertEquals(
            $vet->vet_phone_number,
            $component->state["vet_phone_number"]
        );
    }

    /** @test */
    public function veterinarian_can_be_attached_to_a_pet()
    {
        $vet = Veterinarian::factory()->create();
        $pet = Pet::factory()->create();
        $vet_data = $vet->withoutRelations()->toArray();
        $vet_data["pet_id"] = $pet->id;

        $this->actingAs($pet->owner);

        //dd($vet_data);
        Livewire::test(VeterinarianForm::class, ["pet" => $pet])
            ->call("vet_data", $vet_data)
            ->call("save");
        //dd($pet);
        //dd($pet->veterianarian_id, $vet->id);

        $this->assertEquals($pet->veterianarian_id, $vet->id);
    }
}
