<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PetDetailsWrap extends Component
{
    public $pet;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pet)
    {
        $this->pet = $pet;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("components.pet-details-wrap");
    }
}
