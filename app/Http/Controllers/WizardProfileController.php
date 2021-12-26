<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class WizardProfileController extends Controller
{
    public function __invoke($step = 1)
    {
        return view('wizard.profile-wizard-screen', [
            'user' => Auth::user(),
            'step' => $step,
            'config' => [
                'route_name' => 'wizard.profile',
                'redirect_route_name' => 'pet.update',
                'max_steps' => 2,
            ]
        ]);
    }
}
