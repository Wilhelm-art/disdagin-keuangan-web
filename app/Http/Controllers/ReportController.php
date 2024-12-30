<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Incomes;
use App\Models\Expenses; // Tambahkan model Expenses
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::all();

        // Ambil data laporan (gabungan pemasukan dan pengeluaran)
        $reports = $this->getFilteredReports($request);

        // Return halaman view
        return view('reports.index', [
            'categories' => $categories,
            'reports' => $reports,
        ]);
    }

    public function exportPdf(Request $request)
    {
        // Ambil data laporan dengan filter yang sama
        $reports = $this->getFilteredReports($request);

        // Generate PDF menggunakan DomPDF
        $pdf = Pdf::loadView('reports.pdf', compact('reports'));

        // Download PDF
        return $pdf->download('laporan_keuangan.pdf');
    }

    public function exportExcel(Request $request)
    {
        // Export Excel menggunakan ReportExport
        return Excel::download(new ReportExport($request), 'laporan_keuangan.xlsx');
    }

    public function print(Request $request)
    {
        // Ambil data laporan dengan filter yang sama
        $reports = $this->getFilteredReports($request);

        // Return halaman cetak laporan
        return view('reports.print', compact('reports'));
    }

    /**
     * Fungsi untuk mengambil laporan dengan filter
     */
    private function getFilteredReports(Request $request)
    {
        // Ambil data pemasukan
        $incomes = Incomes::query()
            ->select('date', 'id_category', 'description', 'amount', DB::raw("'income' as type"))
            ->when($request->filled('from_date'), function ($query) use ($request) {
                $query->whereDate('date', '>=', $request->from_date);
            })
            ->when($request->filled('to_date'), function ($query) use ($request) {
                $query->whereDate('date', '<=', $request->to_date);
            })
            ->when($request->filled('id_category'), function ($query) use ($request) {
                $query->where('id_category', $request->id_category);
            });

        // Ambil data pengeluaran
        $expenses = Expenses::query()
            ->select('date', 'id_category', 'description', 'amount', DB::raw("'expense' as type"))
            ->when($request->filled('from_date'), function ($query) use ($request) {
                $query->whereDate('date', '>=', $request->from_date);
            })
            ->when($request->filled('to_date'), function ($query) use ($request) {
                $query->whereDate('date', '<=', $request->to_date);
            })
            ->when($request->filled('id_category'), function ($query) use ($request) {
                $query->where('id_category', $request->id_category);
            });

        // Gabungkan data pemasukan dan pengeluaran
        return $incomes->union($expenses)
            ->orderBy('date', 'asc')
            ->with('category') // Pastikan relasi dengan kategori sudah didefinisikan di model
            ->get();
    }
}
