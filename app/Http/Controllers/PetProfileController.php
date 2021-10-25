<?php

namespace App\Http\Controllers;

class PetProfileController extends Controller
{
    public function create()
    {
        return view('pet.create');
    }

    public function update(\App\Models\Pet $pet)
    {
        $this->authorize('update', $pet);
        return view('pet.update', compact('pet'));
    }
}
