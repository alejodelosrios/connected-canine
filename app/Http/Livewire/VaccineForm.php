<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Livewire\WithFileUploads;

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
                'has_rabies' => $pet->vaccines->has_rabies,
                'has_bordetella' => $pet->vaccines->has_bordetella,
                'has_dhhp' => $pet->vaccines->has_dhhp,
                'proof_file' => $pet->vaccines->proof,
            ];

            if (auth()->user()->hasRole('Admin')) {
                $this->state = array_merge($this->state, [
                    'rabies' => !isset($pet->vaccines->rabies) ? null : $pet->vaccines->rabies->format('Y-m-d'),
                    'bordetella' => !isset($pet->vaccines->bordetella) ? null : $pet->vaccines->bordetella->format('Y-m-d'),
                    'dhhp' => !isset($pet->vaccines->dhhp) ? null : $pet->vaccines->dhhp->format('Y-m-d')
                ]);
            }
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
        $updater->removeProof($this->state['proof_file']);

        $this->pet->refresh();
        $this->state['proof_file'] = $this->pet->vaccines->proof;
    }
}
