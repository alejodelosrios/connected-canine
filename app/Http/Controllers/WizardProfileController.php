<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

class WizardProfileController extends Controller
{
    public function __invoke($step = 1)
    {
        $termsFile = Jetstream::localizedMarkdownPath("terms.md");
        return view("wizard.profile-wizard-screen", [
            "terms" => Str::markdown(file_get_contents($termsFile)),
            "user" => Auth::user(),
            "step" => $step,
            "config" => [
                "route_name" => "wizard.profile",
                "redirect_route_name" => "pet.update",
                "max_steps" => 3,
            ],
        ]);
    }
}
