<?php

namespace App\Http\Controllers;

class VaccineController extends Controller
{
    public function __invoke(\App\Models\Pet $pet)
    {
        $this->authorize('update', $pet);
        return view("pet.vaccines", compact('pet'));
    }
}
