<?php

use Illuminate\Support\Facades\Route;

//--------------------- Administration panel routes-----------------//
//

Route::middleware(["auth:sanctum", "verified"])->group(function () {
    /* Users index */
    Route::get("users", UserListController::class)->name("users-index");
});
