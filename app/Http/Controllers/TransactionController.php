<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\StoreTransactionRequest;
use App\Transaction;
use Auth;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::paginate();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $accounts = Account::get();
        return view('transactions.create', compact('accounts'));
    }

    public function store(StoreTransactionRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $transaction = new Transaction();
        $transaction->fill($data);
        $transaction->save();

        return redirect(route('transactions.index'))->with('success', 'Transaction placed successfully');
    }
}