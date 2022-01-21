<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    public function index()
    {
        $this->authorize('create', Account::class);
        return view('admin.accounts');
    }
}
