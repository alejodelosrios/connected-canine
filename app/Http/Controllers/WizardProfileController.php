<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class WizardProfileController extends Controller
{
    public function __invoke()
    {
        return view('wizard.profile', ['user' => Auth::user()]);
    }
}
