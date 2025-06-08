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


Route::get('/finance/savings', function () {
    $savings = Savings::all()->sortByDesc('saved_at');
    return view('Finance.savings', ['savings' => $savings]);
});

Route::get('/finance/debt', function () {
    $debts = Debt::all()->sortByDesc('due_date');
    return view('Finance.debt', ['debts' => $debts]);
});

Route::get('/finance/expense', function () {
    $expenses = Expense::all()->sortByDesc('date');
    return view('Finance.expense', ['expenses' => $expenses]);
});


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

Route::post('/create-expense', function() {
    request()->validate([
        'amount' => ['required', 'numeric'],
        'due_date' => ['required', 'date'],
        'description' => ['required', 'string', 'max:255', 'min:3'],
    ]);

    Expense::create([
        'amount' => request('amount'),
        'date' => request('due_date'),
        'description' => request('description'),
    ]);

    return redirect('/finance');
});


Route::post('/create-savings', function() {

    request()->validate([
        'amount' => ['required', 'numeric'],
        'due_date' => ['required', 'date'],
        'description' => ['required', 'string', 'max:255', 'min:3']
    ]);

    Savings::create([
        'amount' => request('amount'),
        'saved_at' => request('due_date'),
        'description' => request('description')
    ]);
    return redirect('/finance');
});

