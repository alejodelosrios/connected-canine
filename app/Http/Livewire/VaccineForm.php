<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
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

    public function mount(Pet $pet)
    {
        $this->pet = $pet;

        if (isset($pet->vaccines)) {
            $this->state = [
                'rabies' => $pet->vaccines->rabies?->format('m/d/Y'),
                'bordetella' => $pet->vaccines->bordetella?->format('m/d/Y'),
                'dhhp' => $pet->vaccines->dhhp?->format('m/d/Y'),
                'has_rabies' => isset($pet->vaccines->rabies),
                'has_bordetella' => isset($pet->vaccines->bordetella),
                'has_dhhp' => isset($pet->vaccines->dhhp),
                'proof' => $pet->vaccines->proof,
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

        $updater = new Updater($this->pet);

        $updater->save($this->state);

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    public function removeProof()
    {
        $updater = new Updater($this->pet);
        $updater->removeProof($this->state['proof']);

        $this->pet->refresh();
        $this->state['proof'] = $this->pet->vaccines->proof;
    }
}
