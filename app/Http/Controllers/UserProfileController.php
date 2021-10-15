<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function __invoke()
    {
        return view('backoffice.user-profile', [
            'user' => auth()->user()
        ]);
    }
}
