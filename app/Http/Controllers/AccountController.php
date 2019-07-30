<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\StoreAccountRequest;
use Auth;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::paginate();
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(StoreAccountRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $account = new Account();
        $account->fill($data);
        $account->save();
        return redirect(route('accounts.index'))->with('success', "Account {$request->slug} created successfully");
    }
}
