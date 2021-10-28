<?php

namespace Tests\Feature;

use App\Http\Livewire\EmergencyContactForm;
use App\Models\EmergencyContact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class EmergencyContactFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function current_emergency_contact_is_available()
    {
        $contact = EmergencyContact::factory()->create();
        $user = User::factory()->create([
            "emergency_contact_id" => $contact->id,
        ]);

        $this->actingAs($user);

        $component = Livewire::test(EmergencyContactForm::class, [
            "contact" => $contact,
        ]);

        $this->assertEquals($contact->name, $component->state["name"]);
        $this->assertEquals($contact->lastname, $component->state["lastname"]);
        $this->assertEquals($contact->phone, $component->state["phone"]);
        $this->assertEquals($contact->email, $component->state["email"]);
    }

    /** @test */
    public function emergency_contact_can_be_created()
    {
        $user = User::factory()->create();
        $contact_data = EmergencyContact::factory()
            ->make()
            ->toArray();
        $contact_data["user_id"] = $user->id;

        $this->actingAs($user);

        Livewire::test(EmergencyContactForm::class)
            ->set("state", $contact_data)
            ->call("save");

        $this->assertDatabaseCount("emergency_contacts", 1);
    }

    /** @test */
    public function emergency_contact_can_be_attached_to_an_user()
    {
        $user = User::factory()->create();

        $contact_data = EmergencyContact::factory()
            ->create()
            ->toArray();
        $contact_data["user_id"] = $user->id;

        $this->actingAs($user);

        Livewire::test(EmergencyContactForm::class)
            ->set("state", $contact_data)
            ->call("save");

        $user->refresh();

        $this->assertEquals($contact_data["id"], $user->emergency_contact_id);
    }
}
