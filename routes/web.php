<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\IncomesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BudgetController;

// Home Route
Route::view('/', 'home.index')->name('home');

// Auth Routes (Login & Logout)
Route::group(['middleware' => 'web'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Protected Routes (Dapat diakses oleh semua user terotentikasi: Admin & Kadis)
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Laporan Keuangan
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/export-pdf', [ReportController::class, 'exportPdf'])->name('reports.exportPdf');
    Route::get('reports/export-excel', [ReportController::class, 'exportExcel'])->name('reports.exportExcel');
    Route::get('reports/print', [ReportController::class, 'print'])->name('reports.print');
    Route::get('/reports/pdf', [ReportController::class, 'exportPdf'])->name('reports.pdf');
    Route::get('/reports/excel', [ReportController::class, 'exportExcel'])->name('reports.excel');

    // Sisa Saldo Kategori (AJAX helper)
    Route::get('/categories/{id}/remaining-balance', [ExpensesController::class, 'getRemainingBalance'])->name('categories.remaining-balance');
});

// Admin-Only Routes (Hanya Admin yang dapat mengelola data transaksi & anggaran)
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Kategori
    Route::get('categories', [CategoriesController::class, 'index'])->name('categories');
    Route::get('categories/add', [CategoriesController::class, 'addPage'])->name('categories.addPage');
    Route::post('categories/insert', [CategoriesController::class, 'insert'])->name('categories.insert');
    Route::get('categories/edit/{id}', [CategoriesController::class, 'editPage'])->name('categories.editPage');
    Route::put('categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');

    // Pemasukan
    Route::get('incomes', [IncomesController::class, 'index'])->name('incomes');
    Route::get('incomes/add', [IncomesController::class, 'addPage'])->name('incomes.addPage');
    Route::post('incomes/insert', [IncomesController::class, 'insert'])->name('incomes.insert');
    Route::get('incomes/edit/{id}', [IncomesController::class, 'editPage'])->name('incomes.editPage');
    Route::put('incomes/update/{id}', [IncomesController::class, 'update'])->name('incomes.update');
    Route::delete('incomes/delete/{id}', [IncomesController::class, 'destroy'])->name('incomes.delete');

    // Pengeluaran
    Route::get('expenses', [ExpensesController::class, 'index'])->name('expenses');
    Route::get('expenses/add', [ExpensesController::class, 'addPage'])->name('expenses.addPage');
    Route::post('expenses/insert', [ExpensesController::class, 'insert'])->name('expenses.insert');
    Route::get('expenses/edit/{id}', [ExpensesController::class, 'editPage'])->name('expenses.editPage');
    Route::put('expenses/update/{id}', [ExpensesController::class, 'update'])->name('expenses.update');
    Route::delete('expenses/delete/{id}', [ExpensesController::class, 'destroy'])->name('expenses.delete');

    // Anggaran
    Route::resource('budgets', BudgetController::class);
});

// Nonaktifkan registrasi publik di level auth framework
Auth::routes(['register' => false]);
