<?php

namespace App\Http\Controllers;

use App\Models\Pet;

class AdminPetDetailsController extends Controller
{
    public function index(Pet $pet)
    {
        return view("admin.pet-profile", compact("pet"));
    }

    public function veterinarian(Pet $pet)
    {
        $vet = $pet->veterinarian;
        return view("admin.pet-veterinarian", compact("vet", "pet"));
    }

    public function vaccines(Pet $pet)
    {
        return view("admin.pet-vaccines", compact("pet"));
    }

    public function medications(Pet $pet)
    {
        return view("admin.pet-medications", compact("pet"));
    }

    public function medicationDetails(
        \App\Models\Pet $pet,
        \App\Models\Medication $medication
    ) {
        return view(
            "admin.pet-medication-detail",
            compact("pet", "medication")
        );
    }
}
