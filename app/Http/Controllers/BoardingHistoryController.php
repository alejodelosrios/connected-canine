<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardingHistoryController extends Controller
{
    public function __invoke(\App\Models\Pet $pet)
    {
        return view('pet.boarding-history', ['pet' => $pet]);
    }
}
