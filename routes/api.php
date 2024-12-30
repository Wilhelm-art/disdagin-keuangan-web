<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Incomes;
use App\Models\Expenses;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route API untuk mendapatkan sisa saldo kategori
Route::get('/categories/{id_category}/remaining-balance', function ($id_category) {
    $totalIncome = Incomes::getTotalByCategory($id_category);
    $totalExpense = Expenses::getTotalByCategory($id_category);
    $remainingBalance = $totalIncome - $totalExpense;

    return response()->json(['remainingBalance' => $remainingBalance]);
});

