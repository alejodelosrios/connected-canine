<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;

class TermsOfService extends Component
{
    protected $listeners = [
        "next"
    ];

    public function render()
    {
        $termsFile = Jetstream::localizedMarkdownPath("terms.md");
        return view('livewire.terms-of-service', [
            "terms" => Str::markdown(file_get_contents($termsFile)),
        ]);
    }

    public function next()
    {
        $this->emit("saved", ["pet_id" => auth()->user()->pets->first()->id]);
    }
}
