<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserProfileController extends Controller
{
    public function __invoke(User $user)
    {
        return view("backoffice.user-profile", [
            "user" => $user->exists ? $user : auth()->user(),
        ]);
    }
}
