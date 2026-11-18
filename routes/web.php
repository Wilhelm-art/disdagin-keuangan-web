<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\IncomesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BudgetController;

// Home Route
Route::view('/', 'home.index')->name('home');

// Auth Routes
Route::group(['middleware' => 'web'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Kategori
Route::group(['middleware' => ['auth']], function () {
    Route::get('categories', [CategoriesController::class, 'index'])->name('categories');
    // ...
});

// Incomes
Route::middleware(['auth'])->group(function () {
    Route::get('incomes', [IncomesController::class, 'index'])->name('incomes');
    // ...
});

// Expenses
Route::middleware(['auth'])->group(function () {
    Route::get('expenses', [ExpensesController::class, 'index'])->name('expenses');
    // ...
});

// Laporan
Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('reports/export-pdf', [ReportController::class, 'exportPdf'])->name('reports.exportPdf');
Route::get('reports/export-excel', [ReportController::class, 'exportExcel'])->name('reports.exportExcel');
Route::get('reports/print', [ReportController::class, 'print'])->name('reports.print');

// Budget
Route::resource('budgets', BudgetController::class);

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//PDF & Excel (opsional, jika perlu route terpisah)
Route::get('/reports/pdf', [ReportController::class, 'exportPdf'])->name('reports.pdf');
Route::get('/reports/excel', [ReportController::class, 'exportExcel'])->name('reports.excel');

// Route untuk mendapatkan sisa saldo kategori
Route::get('/categories/{id}/remaining-balance', [ExpensesController::class, 'getRemainingBalance'])->name('categories.remaining-balance');

// Auth Routes
Auth::routes();
