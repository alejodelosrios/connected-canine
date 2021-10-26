<?php

use Illuminate\Support\Facades\Route;
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
    Route::get("pet/add", [PetProfileController::class, "create"])->name(
        "pet.create"
    );
    Route::get("/pet/{pet}/profile/edit", [
        PetProfileController::class,
        "update",
    ])->name("pet.update");

    Route::get("user/profile", UserProfileController::class)->name(
        "user.profile"
    );

    Route::get(
        "register/profile-information/{step}",
        WizardProfileController::class
    )->name("wizard.profile");
    Route::get("/pet/{pet}/veterinarian", VeterinarianController::class)->name(
        "veterinarian"
    );
});
