<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\BehaviorController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\MedicationFormController;
use App\Http\Controllers\PetProfileController;

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

Route::get("/", function () {
    return view("home");
})->name("home");

Route::middleware(["auth:sanctum", "verified"])
    ->get("/welcome", function () {
        return view("welcome");
    })
    ->name("welcome");

//Route::middleware(["auth:sanctum", "verified"])
//->get("/dashboard", function () {
//return view("dashboard");
//})
//->name("dashboard");

Route::middleware(["auth:sanctum", "verified"])->group(function () {
    /* profile */
    Route::get("user/profile", UserProfileController::class)->name(
        "user.profile"
    );
    Route::get("insurance", InsuranceController::class)->name("insurance");
    Route::get("/insurance/proofs", function (\App\Models\User $user) {
        return \Illuminate\Support\Facades\Storage::disk("s3")->download(
            $user->insurance->proof
        );
    })->name("insurance-proof");
    Route::get("emergency-contact", EmergencyContactController::class)->name(
        "emergency-contact"
    );

    /* pets profile*/
    Route::get("pets", [PetController::class, "index"])->name("pet.index");
    Route::get("pets/add", [PetProfileController::class, "create"])->name(
        "pet.create"
    );
    Route::get("pets/{pet}/profile", [
        PetProfileController::class,
        "update",
    ])->name("pet.update");

    /* pet medications */
    Route::get("pets/{pet}/medications", [
        MedicationController::class,
        "index",
    ])->name("pet.medications");
    Route::get("pets/{pet}/medications/{medication}/delete", [
        MedicationController::class,
        "delete",
    ])->name("pet.medication-delete");
    Route::get("pets/{pet}/medications/add", [
        MedicationFormController::class,
        "create",
    ])->name("pet.medication-create");
    Route::get("pets/{pet}/medications/{medication}/update", [
        MedicationFormController::class,
        "update",
    ])->name("pet.medication-update");

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

    /* wizard */
    Route::get(
        "register/profile-information/{step}",
        WizardProfileController::class
    )->name("wizard.profile");

    /* veterinarian */
    Route::get("/pet/{pet}/veterinarian", VeterinarianController::class)->name(
        "veterinarian"
    );

    /* booking */
    Route::resource("bookings", BookingController::class);

    /* message to admin */
    Route::get("messages", MessageController::class)->name("user-message");

    /* vaccines */
    Route::get("/pets/{pet}/vaccines", VaccineController::class)->name(
        "vaccines"
    );

    Route::get("/pets/{pet}/vaccines/proofs", function (\App\Models\Pet $pet) {
        return \Illuminate\Support\Facades\Storage::disk("s3")->download(
            $pet->vaccines->proof
        );
    })->name("vaccine-proof");
});
