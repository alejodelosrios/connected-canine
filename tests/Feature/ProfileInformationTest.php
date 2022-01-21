<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;

class ProfileInformationTest extends TestCase
{
    use RefreshDatabase;

    public function test_current_profile_information_is_available()
    {
        $this->actingAs($user = User::factory()->create());

        $component = Livewire::test(UpdateProfileInformationForm::class);

        $this->assertEquals($user->name, $component->state['name']);
        $this->assertEquals($user->email, $component->state['email']);
    }

    public function test_profile_information_can_be_updated()
    {
        $user = User::factory()->create([
            'name' => 'Test Name',
            'email' => 'test@example.com',
        ]);
        $this->actingAs($user);

        $componet = Livewire::test(UpdateProfileInformationForm::class)
            ->set('state.name', 'Test Name')
            ->set('state.email', 'test@example.com')
            ->call('updateProfileInformation');


        $user->refresh();
        $this->assertEquals('Test Name', $user->name);
        $this->assertEquals('test@example.com', $user->email);
    }
}
