<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Student;
use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    // List all accounts with optional student filter
    public function index(Request $request)
    {
        $query = Account::with('student', 'accountType');

        // Filter by student
        if ($request->filled('student_id')) {
            $query->where('student_id', $request->student_id);
        }

        $accounts = $query->latest()->get();
        $students = Student::orderBy('name')->get(); // for filter dropdown

        return view('admin.accounts.index', compact('accounts', 'students'));
    }

    // Show form to create a new account entry
    public function create($student_id = null)
    {
        $students = Student::orderBy('name')->get();
        $accountTypes = AccountType::orderBy('name')->get();

        return view('admin.accounts.create', compact('students', 'accountTypes', 'student_id'));
    }

    // Store a new account entry
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'account_type_id' => 'nullable|exists:account_types,id',
            'note' => 'nullable|string',
            'date' => 'required|date',
        ]);

        Account::create($request->all());

        return redirect()->route('admin.accounts.index')
            ->with('success', 'Account entry created successfully!');
    }

    public function edit($id)
    {
        $account = Account::findOrFail($id);
        $students = Student::orderBy('name')->get();
        $accountTypes = AccountType::orderBy('name')->get();

        return view('admin.accounts.edit', compact('account', 'students', 'accountTypes'));
    }

    public function update(Request $request, $id)
    {
        $account = Account::findOrFail($id);

        $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'account_type_id' => 'nullable|exists:account_types,id',
            'note' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $account->update($request->all());

        return redirect()->route('admin.accounts.index')
            ->with('success', 'Account entry updated successfully!');
    }

    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return redirect()->route('admin.accounts.index')
            ->with('success', 'Account entry deleted successfully!');
    }
}
