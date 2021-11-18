<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminBehaviorLayout extends Component
{
    public $title;
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
        return view('components.admin-behavior-layout');
    }
}
