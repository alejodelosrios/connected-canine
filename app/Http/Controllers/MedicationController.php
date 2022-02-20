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

}
