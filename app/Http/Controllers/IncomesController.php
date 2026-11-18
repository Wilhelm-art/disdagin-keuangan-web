<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incomes;
use App\Models\Categories;
use App\Models\Budget;
use Illuminate\Support\Facades\DB;

class IncomesController extends Controller
{
    // Menampilkan Semua Data
    public function index()
    {
        $incomes = Incomes::with(['category', 'budget'])->get();
        $categories = Categories::all();
        $budgets = Budget::all();
        return view('dashboard.incomes.list', compact('incomes', 'categories', 'budgets'));
    }

    // Goto Add Data Page
    public function addPage()
    {
        $title = "Tambah Data Pemasukan";
        $categories = Categories::all();
        $budgets = Budget::all();
        return view('dashboard.incomes.add', compact('title', 'categories', 'budgets'));
    }

    // Insert Data
    public function insert(Request $request)
    {
        // Validasi data
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'description' => 'required|string|max:255',
            'date' => 'required|date',
            'id_category' => 'required|exists:categories,id_category',
            'id_budget' => 'required|exists:budgets,id',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Ambil anggaran berdasarkan ID
            $budget = Budget::findOrFail($request->id_budget);

            // Cek apakah jumlah pemasukan melebihi sisa anggaran
            $remainingAmount = $budget->total_amount - $budget->used_amount;
            if ($request->amount > $remainingAmount) {
                return redirect()->back()->withInput()->with('error', 'Jumlah pemasukan melebihi sisa anggaran (Sisa: Rp ' . number_format($remainingAmount, 0, ',', '.') . ').');
            }

            // Masukkan catatan pemasukan baru ke dalam database
            $income = Incomes::create([
                'amount' => $request->amount,
                'description' => $request->description,
                'date' => $request->date,
                'id_category' => $request->id_category,
                'id_budget' => $request->id_budget,
            ]);

            // Tambahkan jumlah penggunaan anggaran
            $budget->increment('used_amount', $request->amount);

            DB::commit(); // Commit transaksi
            return redirect()->route('incomes')->with('success', 'Data pemasukan berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika ada kesalahan
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    // Halaman Edit Pemasukan
    public function editPage($id)
    {
        $title = "Edit Data Pemasukan";
        $income = Incomes::findOrFail($id);
        $categories = Categories::all();
        $budgets = Budget::all();
        return view('dashboard.incomes.edit', compact('title', 'income', 'categories', 'budgets'));
    }

    // Update Pemasukan
    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'description' => 'required|string|max:255',
            'date' => 'required|date',
            'id_category' => 'required|exists:categories,id_category',
            'id_budget' => 'required|exists:budgets,id',
        ]);

        DB::beginTransaction();
        try {
            Incomes::updateData($id, [
                'amount' => $request->amount,
                'description' => $request->description,
                'date' => $request->date,
                'id_category' => $request->id_category,
                'id_budget' => $request->id_budget,
            ]);

            DB::commit();
            return redirect()->route('incomes')->with('success', 'Data pemasukan berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    // Delete Data
    public function destroy($id)
    {
        // Mulai transaksi database
        DB::beginTransaction();

        try {
            $income = Incomes::findOrFail($id);

            // Kurangi jumlah penggunaan anggaran
            if ($income->budget) {
                $income->budget->decrement('used_amount', $income->amount);
            }

            $income->delete(); // Hapus pemasukan
            DB::commit(); // Commit transaksi
            return redirect()->route('incomes')->with('success', 'Data pemasukan berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika ada kesalahan
            return redirect()->route('incomes')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
