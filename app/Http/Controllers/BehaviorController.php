<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class BehaviorController extends Controller
{
    public function background(Pet $pet)
    {
        return view('pet.behavioral-background', compact('pet'));
    }

    public function separationConfinement()
    {
        return 'separationConfinement';
    }

    public function aggressionFear()
    {
        return 'aggressionFear';
    }
}
