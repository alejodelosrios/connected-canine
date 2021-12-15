<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use App\Models\Behavior;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class SeparationConfinementForm extends Component
{
    public $state = [
        'question1' => [
            'value' => [],
            'comments' => '',
        ],
        'question2' => [
            'value' => '',
            'comments' => '',
        ],
    ];

    public $pet;

    protected $listeners = [
        'save' => 'save'
    ];

    public function mount(Pet $pet)
    {
        if ($pet->hasSeparationConfinement()) {
            $behaviors = $pet->separationConfinement()->toArray();
            foreach ($behaviors as $behavior) {
                if ($behavior['behavior_id'] == 5) {
                    if (strlen($behavior['value']) > 0) {
                        $this->state['question1']['value'] = explode(',', $behavior['value']);
                    }
                    if (strlen($behavior['comments']) > 0) {
                        $this->state['question1']['comments'] = $behavior['comments'];
                    }
                }

                if ($behavior['behavior_id'] == 6) {
                    $this->state['question2']['value'] = $behavior['value'];
                    if (strlen($behavior['comments']) > 0) {
                        $this->state['question2']['comments'] = $behavior['comments'];
                    }
                }
            }
        }
    }

    public function save()
    {

        $this->resetErrorBag();

        Validator::make($this->state, [
            'question1.value' => ['nullable', 'array'],
            'question1.comments' => ['nullable', 'string'],
            'question2.value' => ['required', 'string'],
            'question2.comments' => ['required_if:question2.value,Occasionally,Often,Not Often', 'nullable', 'string', 'min:5'],
        ],[
            'question2.comments.required_if'=> 'Description required'
        ])->validateWithBag('save');


        if ((count($this->state['question1']['value']) > 0) || (strlen($this->state['question1']['comments']) > 0)) {
            $this->pet->behaviors()->syncWithoutDetaching([5 => [
                'value' => implode(',', $this->state['question1']['value']),
                'comments' => $this->state['question1']['comments']
            ]]);
        } else {
            $this->pet->behaviors()->detach(5);
        }


        $this->pet->behaviors()->syncWithoutDetaching([6 => [
            'value' => $this->state['question2']['value'],
            'comments' => $this->state['question2']['value'] == 'Occasionally'
                ? $this->state['question2']['comments']
                : ' '
        ]]);

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    public function render()
    {
        return view('livewire.separation-confinement-form', [
            'questions' => Behavior::SeparationConfinementQuestions()
        ]);
    }
}
