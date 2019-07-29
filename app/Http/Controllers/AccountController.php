<?php

namespace App\Http\Controllers;

use App\Account;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::paginate();
        return view('accounts.index', compact('accounts'));
    }
}
