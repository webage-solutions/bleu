<?php

namespace App\Http\Controllers;

use App\Account;
use App\Entry;
use App\Http\Requests\StoreEntryRequest;
use Auth;

class EntryController extends Controller
{
    public function index()
    {
        $entries = Entry::paginate();
        return view('entries.index', compact('entries'));
    }

    public function create(string $type)
    {
        $accounts = Account::get();
        return view('entries.create', compact('accounts', 'type'));
    }

    public function store(StoreEntryRequest $request, string $type)
    {
        $data = $request->all();

        if ($type === 'expense') {
            $message = "Expense created successfully";
            $data['value'] = -$data['value'];
        } else {
            $message = "Revenue created successfully";
        }

        $data['user_id'] = Auth::user()->id;

        $entry = new Entry();
        $entry->fill($data);
        $entry->save();

        return redirect(route('entries.create', compact('type')))->with('success', $message);
    }
}
