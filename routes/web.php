<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AddPetController;
use App\Http\Controllers\BehaviorController;
use App\Http\Controllers\UpdatePetController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\PetProfileController;
use App\Http\Controllers\MedicationFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* home */

Route::view("/", "home")->name("home");

Route::middleware(["auth:sanctum", "verified"])->group(function () {
    /* welcome */
    Route::view("/welcome", "welcome")->name("welcome");

    /* profile */
    Route::get(
        "participants/profile/{user?}",
        UserProfileController::class
    )->name("user.profile");
    Route::get(
        "participant/profile/{user}/insurance",
        InsuranceController::class
    )->name("insurance");
    Route::get("participant/profile/{user}/insurance/preview", function (
        \App\Models\User $user
    ) {
        return response()->file(
            storage_path("app") . "/" . $user->insurance->proof
        );
    })->name("insurance-proof");

    /* Policy */
    Route::view("/policy", "policy-int")->name("policy");

    /* create pet profile*/
    Route::get("pets/add/profile/{petId?}", [
        AddPetController::class,
        "profile",
    ])->name("pet.create");
    Route::get("pets/add/vaccines/{pet?}", [
        AddPetController::class,
        "vaccines",
    ])->name("pet.vaccines.create");
    Route::get("pets/add/background/{pet?}", [
        AddPetController::class,
        "behaviorBackground",
    ])->name("pet.background.create");
    Route::get("pets/add/boarding-history/{pet?}", [
        AddPetController::class,
        "behaviorBoardingHistory",
    ])->name("pet.boarding.create");
    Route::get("pets/add/separation-confinement/{pet?}", [
        AddPetController::class,
        "behaviorSeparationConfinement",
    ])->name("pet.separation.create");
    Route::get("pets/add/aggression-fear/{pet?}", [
        AddPetController::class,
        "behaviorAggressionFear",
    ])->name("pet.aggression.create");
    Route::get("pets/add/vet-medical/{pet?}", [
        AddPetController::class,
        "vetAndMedical",
    ])->name("pet.medical.create");
    Route::get("pets/add/submit/{pet?}", [
        AddPetController::class,
        "submit",
    ])->name("pet.submit");

    /* update pet profile*/
    Route::get("pets", [PetController::class, "index"])->name("pet.index");
    Route::get("pets/{pet}/profile", [
        PetProfileController::class,
        "update",
    ])->name("pet.update");

    /* vaccines */
    Route::get("/pets/{pet}/vaccines", VaccineController::class)->name(
        "vaccines"
    );
    Route::get("/pets/{pet}/vaccines/proofs", function (\App\Models\Pet $pet) {
        return response()->file(
            storage_path("app") . "/" . $pet->vaccines->proof
        );
    })->name("vaccine-proof");

    /* boarding history */
    Route::get(
        "pets/{pet}/behaviors/boarding-history",
        BoardingHistoryController::class
    )->name("pet.boarding-history");

    /* behaviors */
    Route::get("pets/{pet}/behaviors/background", [
        BehaviorController::class,
        "background",
    ])->name("pet.behavior.backgroung");
    Route::get("pets/{pet}/behaviors/separation-confinement", [
        BehaviorController::class,
        "separationConfinement",
    ])->name("pet.behavior.separation-confinement");
    Route::get("pets/{pet}/behaviors/aggression-fear", [
        BehaviorController::class,
        "aggressionFear",
    ])->name("pet.behavior.aggression-fear");

    /* pet medications */
    Route::get("pets/{pet}/medications", [
        MedicationController::class,
        "index",
    ])->name("pet.medications");
    Route::get("pets/{pet}/medications/add", [
        MedicationFormController::class,
        "create",
    ])->name("pet.medication-create");
    Route::get("pets/{pet}/medications/{medication}/update", [
        MedicationFormController::class,
        "update",
    ])->name("pet.medication-update");

    /* wizard */
    Route::get(
        "register/profile-information/{step}",
        WizardProfileController::class
    )->name("wizard.profile");

    /* booking */
    Route::resource("bookings", BookingController::class);

    /* message to admin */
    Route::get("messages", MessageController::class)->name("user-message");
});
