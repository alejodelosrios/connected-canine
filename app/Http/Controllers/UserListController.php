<?php

namespace App\Http\Controllers;

class UserListController extends Controller
{
    public function __invoke()
    {
        return view("admin.users-index");
    }
}
