<?php

namespace Tests\Feature\Livewire;

use App\Models\Pet;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Veterinarian;
use App\Http\Livewire\VeterinarianForm;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

        $this->actingAs($pet->owner);

        Livewire::test(VeterinarianForm::class, ["pet" => $pet])
            ->set("state.id", $vet->id)
            ->set("state.pet_id", $pet->id)
            ->call("save");

        $pet->refresh();
        $this->assertEquals($vet->id, $pet->veterinarian_id);
    }
}
