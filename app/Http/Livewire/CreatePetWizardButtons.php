<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreatePetWizardButtons extends Component
{

    public $redirecTo = '';
    public $redirectBack = '';

    protected $listeners = ['saved' => 'go_forward'];

    public function mount($redirecTo, $redirectBack, $id = null)
    {
        $this->redirecTo = $redirecTo;
        $this->redirectBack = is_null($id)
            ? route($redirectBack)
            : route($redirectBack, $id);
    }

    public function go_forward($payload)
    {

        $route = array_key_exists('pet_id', $payload)
            ? route($this->redirecTo, $payload['pet_id'])
            : route($this->redirecTo);

        return redirect($route);
    }

    public function render()
    {
        return view('livewire.create-pet-wizard-buttons');
    }
}
