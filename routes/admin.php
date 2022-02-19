<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminBehaviorController;
use App\Http\Controllers\AdminPetDetailsController;

//--------------------- Administration panel routes-----------------//
//

Route::middleware(["auth:sanctum", "verified"])->group(function () {
    /* Home */
    /* Route::get("home", function () {return view("dashboard");})->name("dashboard"); */

    /* Users index */
    Route::get("users", UserListController::class)->name("users-index");

    /* Bookings index */
    Route::get("reservations", BookingsListController::class)->name(
        "bookings-index"
    );
    Route::get("old-reservations", BookingsListController::class)->name(
        "old-bookings-index"
    );

    Route::get("user/profile/{user}", function (User $user) {
        return view("admin.user-profile", compact("user"));
    })->name("user-profile");
    Route::get("user/profile/{user}/insurance", function (User $user) {
        if ($user->insurance->proof === null) {
            return redirect()->back();
        }
        return response()->file(
            storage_path("app") . "/" . $user->insurance->proof
        );
    })->name("see-proof-insurance");

    /* Pet profile info  */
    Route::get("pets/{pet}/profile", [
        AdminPetDetailsController::class,
        "index",
    ])->name("pet-profile");

    /* Pet veterinarian  */
    /* Route::get("pets/{pet}/veterinarian", [AdminPetDetailsController::class,"veterinarian",])->name("pet-veterinarian"); */

    /* Pet vaccines  */
    Route::get("pets/{pet}/vaccines", [
        AdminPetDetailsController::class,
        "vaccines",
    ])->name("pet-vaccines");

    /* Pet medications  */
    Route::get("pets/{pet}/medications", [
        AdminPetDetailsController::class,
        "medications",
    ])->name("pet-medications");
    Route::get("pets/{pet}/medications/{medication}/details", [
        AdminPetDetailsController::class,
        "medicationDetails",
    ])->name("pet-medication-details");

    /* Pet behaviors  */
    Route::get("pets/{pet}/behaviors/background", [
        AdminBehaviorController::class,
        "background",
    ])->name("behavior.background");
    Route::get("pets/{pet}/behaviors/separation-confinement", [
        AdminBehaviorController::class,
        "separationConfinement",
    ])->name("behavior.separation-confinement");
    Route::get("pets/{pet}/behaviors/aggression-fear", [
        AdminBehaviorController::class,
        "aggressionFear",
    ])->name("behavior.aggression-fear");
    Route::get("pets/{pet}/behaviors/boarding-history", [
        AdminBehaviorController::class,
        "aggressionFear",
    ])->name("boarding-history");

    /* Accounts  */
    Route::get("accounts/index", [AccountController::class, "index"])->name(
        "accounts"
    );
});
