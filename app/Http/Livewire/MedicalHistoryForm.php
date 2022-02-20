<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class MedicalHistoryForm extends Component
{
    public $contidtions = [
        'Chronic diarrhea',
        'Chronic vomiting',
        'Oral viral papilloma',
        'Any contagious infectious disease',
        'Urinary or fecal incontinence'
    ];
    public $pet;
    public $state;


    public function mount(Pet $pet)
    {
        $this->pet = $pet;
        $this->state['allergies'] = $pet->allergies;
        $this->state['medical_conditions'] = $pet->medicalConditions();
    }

    public function render()
    {
        return view('livewire.medical-history-form');
    }

    public function save()
    {
        $validated = Validator::make($this->state, [
            'allergies' => 'nullable|string',
            'medical_conditions' => 'nullable|array'
        ])->validated();

        $this->pet->allergies = $this->state['allergies'];
        $this->pet->medical_conditions = implode(',', $this->state['medical_conditions']);
        $this->pet->save();
        $this->pet->refresh();
        $this->emit('refresh-navigation-menu');
    }
}
