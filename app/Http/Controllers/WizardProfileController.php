<?php

namespace App\Http\Controllers;

use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Auth;

class WizardProfileController extends Controller
{
    public function __invoke($step = 1)
    {
        $termsFile = Jetstream::localizedMarkdownPath("terms.md");
        $pet = null;
        if (auth()->user()->pets->first()) {
            $pet = auth()->user()->pets->first();
        }
        return view("wizard.profile-wizard-screen", [
            "user" => Auth::user(),
            "step" => $step,
            "pet" => $pet,
            "config" => [
                "route_name" => "wizard.profile",
                "redirect_route_name" => "pet.update",
                "max_steps" => 3,
            ],
        ]);
    }
}
