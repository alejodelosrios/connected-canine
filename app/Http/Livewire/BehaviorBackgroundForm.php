<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use App\Models\Behavior;
use Illuminate\Support\Facades\Validator;

class BehaviorBackgroundForm extends Component
{
    public $state = ['question1', 'question2', 'question3', 'question4'];

    public $pet;

    protected $listeners = [
        'save' => 'save'
    ];

    public function mount(Pet $pet)
    {
        $behaviors_values = ['', '', '', ''];

        if ($pet->hasBehavioralBackground()) {
            $behaviors_values = $pet->behavioralBackground()->toArray();
        }

        $this->state = array_combine($this->state, $behaviors_values);
    }

    public function save()
    {

        $this->resetErrorBag();

        Validator::make($this->state, [
            'question1' => ['required', 'string'],
            'question2' => ['required', 'string'],
            'question3' => ['required', 'string'],
            'question4' => ['required', 'string'],
        ])->validateWithBag('save');


        $this->pet->behaviors()->sync([
            1 => ['value' => $this->state['question1']],
            2 => ['value' => $this->state['question2']],
            3 => ['value' => $this->state['question3']],
            4 => ['value' => $this->state['question4']],
        ]);

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    public function render()
    {
        return view('livewire.behavior-background-form', [
            'questions' => Behavior::BehavioralBackgroundQuestions()
        ]);
    }
}
