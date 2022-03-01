<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PetCreateWizardSteps extends Component
{
    public $step;
    public $pet;
    public $petStep;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($step, $pet, $petStep)
    {
        $this->step = $step;
        $this->pet = $pet;
        $this->petStep = $petStep;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("components.pet-create-wizard-steps");
    }
}
