<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        return view('pet.index', [
            'pets' => auth()->user()->pets
        ]);
    }

    public function details(\App\Models\Pet $pet)
    {
        return view('pet.details', [
            'pet' => $pet
        ]);
    }
}
