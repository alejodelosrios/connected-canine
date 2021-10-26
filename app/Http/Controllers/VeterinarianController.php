<?php

namespace App\Http\Controllers;

use App\Models\Pet;

class VeterinarianController extends Controller
{
    public function __invoke(Pet $pet)
    {
        return view("pet.veterinarian", compact("pet"));
    }
}
