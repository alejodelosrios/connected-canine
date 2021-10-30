<?php

namespace App\Http\Controllers;

class MessageController extends Controller
{
    public function __invoke()
    {
        return view("backoffice.message-form");
    }
}
