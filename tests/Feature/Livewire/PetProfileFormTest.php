<?php

namespace Tests\Feature\Livewire;

use App\Models\Pet;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\PetProfileForm;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PetProfileFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function current_pet_profile_is_available()
    {
        $pet = Pet::factory()->create();
        $this->actingAs($pet->owner);

        $component = Livewire::test(PetProfileForm::class, ['pet' => $pet]);

        $this->assertEquals($pet->name, $component->state['name']);
        $this->assertEquals($pet->birthday->format('m-d-Y'), $component->state['birthday']);
        $this->assertEquals($pet->sex, $component->state['sex']);
        $this->assertEquals($pet->weight, $component->state['weight']);
        $this->assertEquals($pet->color, $component->state['color']);
    }

    /** @test */
    public function pet_profile_can_be_created()
    {
        $pet_data = Pet::factory()->make()->toArray();

        $this->actingAs(\App\Models\User::factory()->create());

        Livewire::test(PetProfileForm::class)
            ->set('state', $pet_data)
            ->call('save');

        $this->assertDatabaseCount('pets', 1);;
    }

    /** @test */
    public function pet_profile_can_be_updated()
    {
        $pet = Pet::factory()->create();
        $new_data = [
            'name' => 'other_name',
            'color' => 'other_color',
            'birthday' => '01-01-2021',
            'sex' => $pet->sex == 'male' ? 'female' : 'male',
            'weight' => 200,
        ];

        $this->actingAs(\App\Models\User::factory()->create());

        Livewire::test(PetProfileForm::class, ['pet' => $pet])
            ->set('state.name', $new_data['name'])
            ->set('state.color', $new_data['color'])
            ->set('state.birthday', $new_data['birthday'])
            ->set('state.sex', $new_data['sex'])
            ->set('state.weight', $new_data['weight'])
            ->call('save');

        $pet->refresh();
        $this->assertEquals($new_data['name'], $pet->name);
        $this->assertEquals($new_data['color'], $pet->color);
        $this->assertEquals($new_data['birthday'], $pet->birthday->format('m-d-Y'));
        $this->assertEquals($new_data['sex'], $pet->sex);
        $this->assertEquals($new_data['weight'], $pet->weight);
    }
}
