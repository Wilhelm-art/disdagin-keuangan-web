<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    /**
     * Tampilkan daftar anggaran.
     */
    public function index()
    {
        $budgets = Budget::all();  // Tidak perlu memuat relasi kategori
        return view('budgets.index', compact('budgets'));
    }

    /**
     * Tampilkan form untuk membuat anggaran baru.
     */
    public function create()
    {
        return view('budgets.create'); // Tidak perlu mengirimkan kategori
    }

    /**
     * Simpan data anggaran baru.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:500',
        ]);

        Budget::create([
            'name' => $request->name,
            'total_amount' => $request->total_amount,
            'description' => $request->description,
        ]);

        return redirect()->route('budgets.index')->with('success', 'Anggaran berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail anggaran.
     */
    public function show($id)
    {
        $budget = Budget::with('category')->findOrFail($id);  // Menampilkan anggaran beserta kategori
        return view('budgets.show', compact('budget'));
    }

    /**
     * Tampilkan form untuk edit anggaran.
     */
    public function edit($id)
    {
        $budget = Budget::findOrFail($id);
        return view('budgets.edit', compact('budget'));  // Tidak perlu memuat kategori
    }

    /**
     * Update data anggaran.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:500',
        ]);

        $budget = Budget::findOrFail($id);
        $budget->update([
            'name' => $request->name,
            'total_amount' => $request->total_amount,
            'description' => $request->description,
        ]);

        return redirect()->route('budgets.index')->with('success', 'Anggaran berhasil diperbarui!');
    }

    /**
     * Hapus data anggaran.
     */
    public function destroy($id)
    {
        $budget = Budget::findOrFail($id);  // Menemukan anggaran berdasarkan ID
        $budget->delete();  // Menghapus anggaran

        return redirect()->route('budgets.index')->with('success', 'Anggaran berhasil dihapus!');
    }
}
