<?php

namespace App\Http\Livewire;

use App\Models\Insurance;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\InsuranceService as Updater;

class InsuranceForm extends Component
{
    use WithFileUploads;
    public $state;
    public $user;

    public function mount()
    {
        $user = Auth::user();
        $this->user = $user;

        if (isset($user->insurance)) {
            $this->state = [
                "proof_file" => $user->insurance->proof,
            ];
        }
    }
    public function render()
    {
        return view("livewire.insurance-form");
    }

    public function save()
    {
        $this->resetErrorBag();

        $updater = new Updater();

        $updater->save($this->state);

        $this->emit("saved");

        $this->emit("refresh-navigation-menu");
    }

    public function removeProof()
    {
        $updater = new Updater();
        $updater->removeProof($this->state["proof_file"]);

        $this->user->refresh();
        $this->state["proof_file"] = $this->user->insurance->proof;
    }
}
