<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserDetailsWrap extends Component
{
    public $user;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user, $title = "Non title")
    {
        $this->user = $user;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("components.user-details-wrap");
    }
}
