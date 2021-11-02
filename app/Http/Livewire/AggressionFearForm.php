<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Behavior;

class AggressionFearForm extends Component
{
    public function render()
    {
        return view('livewire.aggression-fear-form', [
            'questions' => Behavior::AggressionFearQuestions()
        ]);
    }
}
