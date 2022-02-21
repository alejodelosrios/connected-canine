<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use App\Services\VaccineService as Updater;

class VaccineForm extends Component
{
    use WithFileUploads;

    public $pet;

    public $state = [
        'has_rabies' => false,
        'has_bordetella' => false,
        'has_dhhp' => false,
    ];

    protected $listeners = [
        'save' => 'save'
    ];

    public function mount(Pet $pet)
    {
        $this->pet = $pet;

        if (isset($pet->vaccines)) {
            $this->state = [
                'proof_file' => $pet->vaccines->proof,
            ];
        }
    }

    public function render()
    {
        return view('livewire.vaccine-form');
    }

    public function save()
    {
        $this->resetErrorBag();

        Validator::make($this->state, [
            'proof_file' => ['required']
        ])->validateWithBag("save");

        $updater = new Updater($this->pet);

        $updater->save($this->state);

        $this->emit("saved", ["pet_id" => $this->pet->id]);

        $this->emit('refresh-navigation-menu');
    }

    public function removeProof()
    {
        $updater = new Updater($this->pet);
        $updater->removeProof($this->state['proof_file']);

        $this->pet->refresh();
        $this->state['proof_file'] = $this->pet->vaccines->proof;
    }
}
