<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SaveButton extends Component
{
    public $redirect_route_name = '';

    protected $listeners = ['saved' => 'go_forward'];

    public function mount($redirect_route_name)
    {
        $this->redirect_route_name = $redirect_route_name;
    }

    public function go_forward()
    {
        return redirect($this->redirect_route_name);
    }

    public function render()
    {
        return view('livewire.save-button');
    }
}
