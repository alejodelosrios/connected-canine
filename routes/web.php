<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\BehaviorController;
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

Route::middleware(["auth:sanctum", "verified"])->group(function () {
    /* profile */
    Route::get("user/profile", UserProfileController::class)->name(
        "user.profile"
    );
    Route::get("insurance", InsuranceController::class)->name("insurance");
    Route::get("emergency-contact", EmergencyContactController::class)->name(
        "emergency-contact"
    );

    /* pets profile*/
    Route::get("pets", [PetController::class, "index"])->name("pet.index");
    Route::get("pets/add", [PetProfileController::class, "create"])->name("pet.create");
    Route::get("pets/{pet}/profile", [PetProfileController::class, "update",])->name("pet.update");

    /* boarding history */
    Route::get("pets/{pet}/boarding-history", BoardingHistoryController::class)->name("pet.boarding-history");

    /* behaviors */
    Route::get("pets/{pet}/behaviors/background", [BehaviorController::class, 'background'])->name("pet.behavior.backgroung");
    Route::get("pets/{pet}/behaviors/separation-confinement", [BehaviorController::class, 'separationConfinement'])->name("pet.behavior.separation-confinement");
    Route::get("pets/{pet}/behaviors/aggression-fear", [BehaviorController::class, 'aggressionFear'])->name("pet.behavior.aggression-fear");

    /* wizard */
    Route::get("register/profile-information/{step}", WizardProfileController::class)->name("wizard.profile");

    /* veterinarian */
    Route::get("/pet/{pet}/veterinarian", VeterinarianController::class)->name(
        "veterinarian"
    );

    /* booking */
    Route::resource("bookings", BookingController::class);

    /* message to admin */
    Route::get("messages", MessageController::class)->name("user-message");

    /* vaccines */
    Route::get("/pets/{pet}/vaccines", VaccineController::class)->name("vaccines");
});
