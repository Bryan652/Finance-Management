<?php

use App\Models\Debt;
use App\Models\Expense;
use App\Models\Savings;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $totalSavings = Savings::sum('amount');
    $totalExpenses = Expense::sum('amount');
    $paidDebts = Debt::where('status', 'paid')->sum('amount'); // hanapin yung status na paid then i sumsum yung amount nung mga paid debts
    $pendingDebts = Debt::where('status', 'pending')->sum('amount'); // hanapin yung status na pending then i sumsum yung amount nung mga pending debts
    return view('home', ['savings' => $totalSavings, 'expenses' => $totalExpenses, 'paidDebts' => $paidDebts, 'pendingDebts' => $pendingDebts]);
});

Route::get('/finance', function () {
    $savings = savings::all()->sortByDesc('saved_at');
    $expenses = expense::all()->sortByDesc('date');
    $debts = debt::all()->sortByDesc('due_date');
    return view('Finance.index', ['savings' => $savings, 'expenses' => $expenses, 'debts' => $debts]);
});

// For adding
Route::get('/finance/{type}', function ($type) {
    if ($type == 'savings') {
        return view('Finance.savingsCreation');
    } elseif ($type == 'expense') {
        return view('Finance.expenseCreation');
    } elseif ($type == 'debt') {
        return view('Finance.debtCreation');
    } else {
        abort(404, 'Type not found');
    }
});

// This creates expenses
Route::post('/create-debt', function() {
    request()->validate([
        'amount' => ['required', 'numeric'],
        'description' => ['required', 'string', 'max:255', 'min:3'],
        'due_date' => ['required', 'date'],
        'status' => ['required', 'string', 'in:Pending,Paid,Overdue'],
    ]);

    Debt::create([
        'amount' => request('amount'),
        'description' => request('description'),
        'due_date' => request('due_date'),
        'status' => request('status'),
    ]);

    return redirect('/finance');
});

// This creates both savings and expenses
Route::post('/create', function() {
    request()->validate([
        'amount' => ['required', 'numeric'],
        'due_date' => ['required', 'date'],
        'description' => ['required', 'string', 'max:255', 'min:3'],
    ]);

    if (request('type') == 'savings') {
        Savings::create([
            'amount' => request('amount'),
            'saved_at' => request('due_date'),
            'description' => request('description'),
        ]);
    } else {
        Expense::create([
            'amount' => request('amount'),
            'date' => request('due_date'),
            'description' => request('description'),
        ]);
    }

    return redirect('/finance');
});

// editpage nung savings at expense
Route::get('/finance/{type}/{id}/edit', function($type, $id) {
    //  http://127.0.0.1:8000/finance/savings/1/edit

    if ($type == 'savings') {
        $find = Savings::findOrFail($id);
        return view('Finance.edit', ['item' => $find, 'title' => 'Edit Savings', 'description' => 'Savings Savings Savings']);
    }

    elseif ($type == 'expense') {
        $find = Expense::findOrFail($id);
        return view('Finance.edit', ['item' => $find, 'title' => 'Edit Expense', 'description' => 'Expense Expense Expense']);
    }

    elseif ($type == 'debt') {
        $find = Debt::findOrFail($id);
        return view('Finance.editDebt', ['debt' => $find]);
    }

    else {
        abort(404, 'Type not found');
    }

});

//updates nung tatlo
Route::patch('/finance/{type}/{id}', function($type, $id) {

    // updating ng savings
    if ($type == 'savings') {
        request()->validate([
            'amount' => ['required', 'numeric'],
            'saved_at' => ['required', 'date'],
            'description' => ['required', 'string', 'max:255', 'min:3'],
        ]);
        $savings = Savings::findOrFail($id);
        $savings->update([
            'amount' => request('amount'),
            'saved_at' => request('saved_at'),
            'description' => request('description')
        ]);
    }

    // updating ng expense
    elseif ($type == 'expense') {
        request()->validate([
            'amount' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:255', 'min:3'],
        ]);
        $expense = Expense::findOrFail($id);
        $expense->update([
            'amount' => request('amount'),
            'date' => request('saved_at'),
            'description' => request('description')
        ]);
    }

    // updating ng debt
    elseif ($type == 'debt') {
        request()->validate([
            'amount' => ['required', 'numeric'],
            'description' => ['required', 'string', 'max:255', 'min:3'],
            'due_date' => ['required', 'date'],
            'status' => ['required', 'string', 'in:Pending,Paid,Overdue'],
        ]);
        $debt = Debt::findOrFail($id);
        $debt->update([
            'amount' => request('amount'),
            'description' => request('description'),
            'due_date' => request('due_date'),
            'status' => request('status'),
        ]);
    }

    return redirect('/finance');
});

//delete
Route::delete('/finance/{type}/{description}', function($type, $description) {
    if ($type == 'savings') {
        Savings::where('description', $description)->firstOrFail()->delete();
    } elseif ($type == 'expense') {
        Expense::where('description', $description)->firstOrFail()->delete();
    } elseif ($type == 'debt') {
        Debt::where('description', $description)->firstOrFail()->delete();
    }
    return redirect('/finance');
});
