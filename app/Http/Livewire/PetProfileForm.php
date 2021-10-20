<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\PetProfile as Updater;

class PetProfileForm extends Component
{
    use WithFileUploads;

    public $photo;

    public function mount($pet = null)
    {
        $this->state = $pet?->withoutRelations()->toArray() ?? [];
    }

    public function save()
    {
        $this->resetErrorBag();
        $updater = new Updater;
        $updater->save(
            $this->photo
                ? array_merge($this->state, ['photo' => $this->photo])
                : $this->state
        );
        /*
        if (isset($this->photo)) {
            return redirect()->route('dog-pprofile.show');
        }
 */
        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    public function render()
    {
        return view('livewire.pet-profile-form');
    }

    public function getPetProperty()
    {
        /* return \App\Models\Pet::find($this->state['id']); */
    }
}
