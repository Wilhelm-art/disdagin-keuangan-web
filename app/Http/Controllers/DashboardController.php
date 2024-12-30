<?php

namespace App\Http\Controllers;

use App\Models\Incomes;
use App\Models\Expenses;
use App\Models\Balance;
use App\Models\Categories;
use App\Models\Budget; // Pastikan model Budget sudah ada

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Ambil total pemasukan, pengeluaran, balance, kategori, dan anggaran
        $total_incomes = Incomes::totalIncomes();
        $total_balance = Balance::totalBalance();
        $total_categories = Categories::totalCategories();
        $total_expenses = Expenses::totalExpenses();
        $total_budget = Budget::sum('total_amount'); // Ambil total anggaran

        // Ambil semua data pemasukan dan pengeluaran dari model balance
        $incomesAndExpenses = Balance::getAllIncomesAndExpenses();

        // Ambil semua data kategori dari model categories
        $categories = Categories::getAll();

        // Ambil data pemasukan per bulan
        $monthlyIncomes = Incomes::selectRaw('MONTH(date) as month, YEAR(date) as year, SUM(amount) as total')
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Ambil data pengeluaran per bulan
        $monthlyExpenses = Expenses::selectRaw('MONTH(date) as month, YEAR(date) as year, SUM(amount) as total')
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Ambil data pemasukan dan pengeluaran per tahun
        $yearlyIncomes = Incomes::selectRaw('YEAR(date) as year, SUM(amount) as total')
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        $yearlyExpenses = Expenses::selectRaw('YEAR(date) as year, SUM(amount) as total')
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        // Data yang dikirim ke view
        $data = [
            'total_incomes' => $total_incomes,
            'total_balance' => $total_balance,
            'total_categories' => $total_categories,
            'total_expenses' => $total_expenses,
            'total_budget' => $total_budget, // Kirim total budget ke view
            'incomesAndExpenses' => $incomesAndExpenses,
            'categories' => $categories,
            'monthlyIncomes' => $monthlyIncomes,
            'monthlyExpenses' => $monthlyExpenses,
            'yearlyIncomes' => $yearlyIncomes,
            'yearlyExpenses' => $yearlyExpenses,
        ];

        return view('dashboard/index', $data);
    }
}
