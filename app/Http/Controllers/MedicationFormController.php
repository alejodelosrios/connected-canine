<?php

namespace App\Http\Controllers;

class MedicationFormController extends Controller
{
    public function create(\App\Models\Pet $pet)
    {
        return view("pet.medication-create", compact("pet"));
    }

    public function update(
        \App\Models\Pet $pet,
        \App\Models\Medication $medication
    ) {
        $this->authorize("update", $pet);
        return view("pet.medication-update", compact("pet", "medication"));
    }
}
