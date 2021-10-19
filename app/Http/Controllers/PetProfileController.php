<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetProfileController extends Controller
{
    public function __invoke(Pet $pet)
    {
        return view('pet.profile', compact('pet'));
    }
}
