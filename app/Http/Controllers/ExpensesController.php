<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\Categories;
use App\Models\Incomes;

class ExpensesController extends Controller
{
    // Halaman List Pengeluaran
    public function index()
    {
        // Gunakan eager loading untuk relasi kategori
        $expenses = Expenses::with('category')->get();
        $categories = Categories::all(); // Ambil semua kategori
        return view('dashboard.expenses.list', compact('expenses', 'categories'));
    }

    // Halaman Tambah Pengeluaran
    public function addPage()
    {
        $categories = Categories::all(); // Ambil semua kategori
        return view('dashboard.expenses.add', compact('categories'));
    }

    // Tambah Pengeluaran
    public function insert(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_category' => 'required|exists:categories,id_category',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:1',
            'description' => 'nullable|string|max:255',
        ]);

        // Ambil data kategori dan hitung saldo
        $id_category = $request->id_category;
        $amount = $request->amount;

        $totalIncome = Incomes::where('id_category', $id_category)->sum('amount'); // Total pemasukan
        $totalExpense = Expenses::where('id_category', $id_category)->sum('amount'); // Total pengeluaran
        $remainingBalance = $totalIncome - $totalExpense; // Saldo tersisa

        // Cek jika saldo mencukupi
        if ($amount > $remainingBalance) {
            return redirect()->back()->withErrors([
                'amount' => 'Saldo tidak mencukupi untuk pengeluaran ini.',
            ])->withInput();
        }

        // Tambahkan data pengeluaran baru
        Expenses::create([
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
            'id_category' => $request->id_category,
            'created_at' => now(),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('expenses')->with('success', 'Pengeluaran berhasil ditambahkan!');
    }

    // Hapus Pengeluaran
    public function destroy($id)
    {
        $expense = Expenses::find($id); // Cari pengeluaran berdasarkan ID
        if ($expense) {
            $expense->delete(); // Hapus data pengeluaran
            return redirect()->route('expenses')->with('success', 'Pengeluaran berhasil dihapus!');
        }

        return redirect()->route('expenses')->with('error', 'Data pengeluaran tidak ditemukan.');
    }

    // Tambahkan ke ExpensesController
    public function getRemainingBalance($id_category)
    {
        // Hitung total pemasukan dan pengeluaran berdasarkan kategori
        $totalIncome = Incomes::where('id_category', $id_category)->sum('amount');
        $totalExpense = Expenses::where('id_category', $id_category)->sum('amount');
        $remainingBalance = $totalIncome - $totalExpense;

        // Return data dalam format JSON
        return response()->json([
            'success' => true,
            'remaining_balance' => $remainingBalance,
        ]);
    }
}
