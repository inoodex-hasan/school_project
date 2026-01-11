<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    // List all account types
    public function index()
    {
        $accountTypes = AccountType::latest()->get();
        return view('admin.account_types.index', compact('accountTypes'));
    }

    // Show form to create a new account type
    public function create()
    {
        return view('admin.account_types.create');
    }

    // Store a new account type
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:account_types,name',
        ]);

        AccountType::create($request->all());

        return redirect()->route('admin.account_types.index')
            ->with('success', 'Account type created successfully!');
    }

    // Show form to edit an existing account type
    public function edit(AccountType $accountType)
    {
        return view('admin.account_types.edit', compact('accountType'));
    }

    // Update the account type
    public function update(Request $request, AccountType $accountType)
    {
        $request->validate([
            'name' => 'required|string|unique:account_types,name,' . $accountType->id,
        ]);

        $accountType->update($request->all());

        return redirect()->route('admin.account_types.index')
            ->with('success', 'Account type updated successfully!');
    }

    // Delete an account type
    public function destroy(AccountType $accountType)
    {
        $accountType->delete();

        return redirect()->route('admin.account_types.index')
            ->with('success', 'Account type deleted successfully!');
    }
}
