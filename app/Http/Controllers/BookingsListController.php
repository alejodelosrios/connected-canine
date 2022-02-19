<?php

namespace App\Http\Controllers;

class BookingsListController extends Controller
{
    public function __invoke()
    {
        return view("admin.bookings-index");
    }
}
