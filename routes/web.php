<?php

use App\Models\debt;
use App\Models\expense;
use App\Models\savings;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $savings = savings::all();
    $expenses = expense::all();
    $debts = debt::all();
    return view('home', ['savings' => $savings, 'expenses' => $expenses, 'debts' => $debts]);
});

Route::get('/finance', function () {
    $savings = savings::all();
    $expenses = expense::all();
    $debts = debt::all();
    return view('Finance.index', ['savings' => $savings, 'expenses' => $expenses, 'debts' => $debts]);
});
