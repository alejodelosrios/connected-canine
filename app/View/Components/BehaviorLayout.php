<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BehaviorLayout extends Component
{
    public $title;
    public $pet;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, $pet)
    {
        $this->title = $title;
        $this->pet = $pet;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("layouts.behavior-layout");
    }
}
