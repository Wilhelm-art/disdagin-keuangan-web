<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    // Inisilisasi Table
    protected $table = 'balance';
    public $timestamps = false;

    // Table Pemasukan dan Pengeluaran
    protected $incomesTable = 'incomes';
    protected $expensesTable = 'expenses'; 

    // Fill Table
    protected $fillable = [
        'amount', 'description', 'updated_at'
    ];

    // Get All Data
    public static function getAll()
    {
        return Balance::all();
    }

    // Get Data by ID
    public static function getById($id)
    {
        return Balance::where('id_balance', $id)->first();
    }

    // Total Balance
    public static function totalBalance()
    {
        $totalBalance = Balance::sum('amount');
        return $totalBalance;
    }

    // Mengambil semua data pemasukan dan pengeluaran
    public static function getAllIncomesAndExpenses()
    {
        // Ambil semua data pemasukan dan beri label type
        $incomes = Incomes::all()->map(function ($item) {
            $item->type = 'income';
            return $item;
        });

        // Ambil semua data pengeluaran dan beri label type
        $expenses = Expenses::all()->map(function ($item) {
            $item->type = 'expense';
            return $item;
        });

        // Gabungkan data pemasukan dan pengeluaran
        $incomesAndExpenses = $incomes->concat($expenses);

        // Urutkan data berdasarkan tanggal terbaru
        return $incomesAndExpenses->sortByDesc('date');
    }
}
