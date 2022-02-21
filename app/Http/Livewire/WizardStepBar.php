<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WizardStepBar extends Component
{
    public $step = 1;

    public $route_name;

    public $redirect_route_name = "welcome";

    public $max_steps;

    protected $listeners = ["saved" => "go_forward"];

    public function mount(array $config, $step)
    {
        $this->step = $step;
        $this->route_name = $config["route_name"];
        $this->redirect_route_name = $config["redirect_route_name"];
        $this->max_steps = $config["max_steps"];
    }

    public function render()
    {
        return view("livewire.wizard-step-bar");
    }

    public function next()
    {
        $this->emit("next");
    }

    public function go_forward($payload = null)
    {
        if ((int) $this->step === (int) $this->max_steps) {
            return redirect()->route("pet.create", $payload["pet_id"]);
        }

        $this->step++;
        return redirect()->route($this->route_name, $this->step);
    }
}
