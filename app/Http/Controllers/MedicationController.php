<?php

namespace App\Http\Controllers;
use App\Services\Medication as MedicationServiceClass;
use App\Models\Pet;

class MedicationController extends Controller
{
    protected $medicationServiceClass;

    public function index(Pet $pet)
    {
        return view("pet.medication-index", compact("pet"));
    }

    public function delete(
        \App\Models\Pet $pet,
        \App\Models\Medication $medication
    ) {
        $this->medicationServiceClass = new MedicationServiceClass();
        $this->medicationServiceClass->delete($medication);
        return redirect()->back();
    }
}
