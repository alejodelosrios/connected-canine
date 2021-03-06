<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Services\UpdatePetWizardStep;


class AddPetController extends Controller
{
    public function profile($petId = null)
    {

        $pet = $petId;
        $petStep = 0;
        if (!is_null($petId)) {
            $pet = Pet::findOrFail($petId);
            $petStep = $pet->step;
            $this->authorize("update", $pet);
        }
        return view("pet.create-wizard.create", [
            "redirectBack" => "pet.index",
            "redirecTo" => "pet.vaccines.create",
            "petStep" => $petStep,
            "pet" => $pet,
            "step" => 1,
        ]);
    }

    public function vaccines(Pet $pet)
    {

        if (!$pet || !$pet->id) {
            return redirect()->back();
        }

        $this->authorize("update", $pet);

        return view("pet.create-wizard.vaccines", [
            "redirectBack" => "pet.create",
            "redirecTo" => "pet.background.create",
            "petStep" => $pet->step,
            "pet" => $pet,
            "step" => 2,
        ]);
    }

    public function behaviorBackground(Pet $pet)
    {
        if (!$pet || !$pet->id) {
            return redirect()->back();
        }
        $this->authorize("update", $pet);
        return view("pet.create-wizard.background", [
            "redirectBack" => "pet.vaccines.create",
            "redirecTo" => "pet.boarding.create",
            "petStep" => $pet->step,
            "pet" => $pet,
            "step" => 3,
        ]);
    }

    public function behaviorBoardingHistory(Pet $pet)
    {
        if (!$pet || !$pet->id) {
            return redirect()->back();
        }
        $this->authorize("update", $pet);
        return view("pet.create-wizard.boarding-history", [
            "redirectBack" => "pet.background.create",
            "redirecTo" => "pet.separation.create",
            "petStep" => $pet->step,
            "pet" => $pet,
            "step" => 4,
        ]);
    }

    public function behaviorSeparationConfinement(Pet $pet)
    {
        if (!$pet || !$pet->id) {
            return redirect()->back();
        }
        $this->authorize("update", $pet);
        return view("pet.create-wizard.separation", [
            "redirectBack" => "pet.boarding.create",
            "redirecTo" => "pet.aggression.create",
            "petStep" => $pet->step,
            "pet" => $pet,
            "step" => 5,
        ]);
    }

    public function behaviorAggressionFear(Pet $pet)
    {
        if (!$pet || !$pet->id) {
            return redirect()->back();
        }
        $this->authorize("update", $pet);
        return view("pet.create-wizard.aggression", [
            "redirectBack" => "pet.separation.create",
            "redirecTo" => "pet.medical.create",
            "petStep" => $pet->step,
            "pet" => $pet,
            "step" => 6,
        ]);
    }

    public function vetAndMedical(Pet $pet)
    {
        if (!$pet || !$pet->id) {
            return redirect()->back();
        }
        $this->authorize("update", $pet);
        return view("pet.create-wizard.medical", [
            "redirectBack" => route("pet.aggression.create", $pet),
            "redirecTo" => route("pet.submit", $pet),
            "error" => false,
            "petStep" => $pet->step,
            "pet" => $pet,
            "step" => 7,
        ]);
    }

    public function submit(Pet $pet)
    {
        if (!$pet || !$pet->id) {
            return redirect()->back();
        }
        $this->authorize("update", $pet);
        if (!$pet->veterinarian) {
            return redirect()
                ->route("pet.medical.create", $pet)
                ->withErrors(["veterinarian" => true]);
        }

        $pet->forceFill(["complete" => true])->save();
        UpdatePetWizardStep::pushStep($pet, UpdatePetWizardStep::COMPLETED);

        return view("pet.create-wizard.submit", [
            "redirectBack" => route("pet.medical.create", $pet),
            "redirecTo" => route("pet.index"),
            "petStep" => $pet->step,
            "pet" => $pet,
            "step" => 8,
        ]);
    }
}
