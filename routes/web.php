<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/welcome', function () {
    return view('welcome');
})->name('welcome');



Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    /* profile */
    Route::get('user/profile', UserProfileController::class)->name('user.profile');
    Route::get('insurance', InsuranceController::class)->name('insurance');
    Route::get('emergency-contact', EmergencyContactController::class)->name('emergency-contact');

    /* pets profile*/
    Route::get('pets', [PetController::class, 'index'])->name('pet.index');
    Route::get('pets/add', [PetProfileController::class, 'create'])->name('pet.create');
    Route::get('pets/{pet}/profile/edit', [PetProfileController::class, 'update'])->name('pet.update');

    /* pet details */
    Route::get('pets/{pet}/details', [PetController::class, 'details'])->name('pet.details');

    /* wizard */
    Route::get('register/profile-information/{step}', WizardProfileController::class)->name('wizard.profile');

    /* booking */
    Route::resource('bookings', BookingController::class);
});
