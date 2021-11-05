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

    public function separationConfinement(Pet $pet)
    {
        return view('pet.separation-confinement', compact('pet'));
    }

    public function aggressionFear(Pet $pet)
    {
        return view('pet.aggression-fear', compact('pet'));
    }
}
