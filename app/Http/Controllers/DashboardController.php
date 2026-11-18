<?php

namespace App\Http\Controllers;

use App\Models\Incomes;
use App\Models\Expenses;
use App\Models\Balance;
use App\Models\Categories;
use App\Models\Budget;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 1. Ringkasan Pagu & Realisasi
        $total_incomes = Incomes::sum('amount');
        $total_expenses = Expenses::sum('amount');
        $total_budget = Budget::sum('total_amount');
        $total_categories = Categories::count();
        $total_balance = $total_incomes - $total_expenses;

        // 2. Ambil 10 transaksi kas terbaru secara teroptimasi (bukan load seluruh isi tabel)
        $latestIncomes = Incomes::latest('date')->take(10)->get()->map(function ($item) {
            $item->type = 'income';
            return $item;
        });
        $latestExpenses = Expenses::latest('date')->take(10)->get()->map(function ($item) {
            $item->type = 'expense';
            return $item;
        });
        $incomesAndExpenses = $latestIncomes->concat($latestExpenses)->sortByDesc('date')->take(10);

        // 3. Kategori untuk label transaksi
        $categories = Categories::select('id_category', 'name_category')->get();

        // 4. Data tren bulanan & tahunan (Support PostgreSQL & MySQL)
        $driver = DB::getDriverName();
        $currentYear = (int)date('Y');

        if ($driver === 'pgsql') {
            $monthlyIncomes = Incomes::selectRaw('CAST(EXTRACT(MONTH FROM date) AS INTEGER) as month, SUM(amount) as total')
                ->whereRaw('EXTRACT(YEAR FROM date) = ?', [$currentYear])
                ->groupByRaw('EXTRACT(MONTH FROM date)')
                ->orderByRaw('EXTRACT(MONTH FROM date) asc')
                ->get();

            $monthlyExpenses = Expenses::selectRaw('CAST(EXTRACT(MONTH FROM date) AS INTEGER) as month, SUM(amount) as total')
                ->whereRaw('EXTRACT(YEAR FROM date) = ?', [$currentYear])
                ->groupByRaw('EXTRACT(MONTH FROM date)')
                ->orderByRaw('EXTRACT(MONTH FROM date) asc')
                ->get();

            $yearlyIncomes = Incomes::selectRaw('CAST(EXTRACT(YEAR FROM date) AS INTEGER) as year, SUM(amount) as total')
                ->groupByRaw('EXTRACT(YEAR FROM date)')
                ->orderByRaw('EXTRACT(YEAR FROM date) asc')
                ->get();

            $yearlyExpenses = Expenses::selectRaw('CAST(EXTRACT(YEAR FROM date) AS INTEGER) as year, SUM(amount) as total')
                ->groupByRaw('EXTRACT(YEAR FROM date)')
                ->orderByRaw('EXTRACT(YEAR FROM date) asc')
                ->get();
        } else {
            $monthlyIncomes = Incomes::selectRaw('MONTH(date) as month, SUM(amount) as total')
                ->whereYear('date', $currentYear)
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();

            $monthlyExpenses = Expenses::selectRaw('MONTH(date) as month, SUM(amount) as total')
                ->whereYear('date', $currentYear)
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();

            $yearlyIncomes = Incomes::selectRaw('YEAR(date) as year, SUM(amount) as total')
                ->groupBy('year')
                ->orderBy('year', 'asc')
                ->get();

            $yearlyExpenses = Expenses::selectRaw('YEAR(date) as year, SUM(amount) as total')
                ->groupBy('year')
                ->orderBy('year', 'asc')
                ->get();
        }

        // Data yang dikirim ke view
        $data = [
            'total_incomes' => $total_incomes,
            'total_balance' => $total_balance,
            'total_categories' => $total_categories,
            'total_expenses' => $total_expenses,
            'total_budget' => $total_budget,
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
