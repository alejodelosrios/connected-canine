<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmergencyContactController extends Controller
{
    public function __invoke()
    {
        return view('backoffice.emergency-contact');
    }
}
