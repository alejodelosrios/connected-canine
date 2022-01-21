<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function __invoke(User $user)
    {
        return view('backoffice.insurance', compact('user'));
    }
}
