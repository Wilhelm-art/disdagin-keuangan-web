<?php

namespace App\Exports;

use App\Models\Incomes;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $fromDate;
    protected $toDate;
    protected $idCategory;

    // Untuk penomoran "No"
    private static $rowNumber = 0;

    public function __construct(Request $request)
    {
        $this->fromDate = $request->from_date;
        $this->toDate = $request->to_date;
        $this->idCategory = $request->id_category;
    }

    /**
     * Mengambil data union dari Incomes dan Expenses sesuai filter.
     */
    public function collection()
    {
        // Query incomes
        $incomes = Incomes::query()
            ->select([
                'date',
                'id_category',
                'description',
                'amount',
                DB::raw("'income' as type")
            ])
            ->when($this->fromDate, function ($query) {
                $query->whereDate('date', '>=', $this->fromDate);
            })
            ->when($this->toDate, function ($query) {
                $query->whereDate('date', '<=', $this->toDate);
            })
            ->when($this->idCategory, function ($query) {
                $query->where('id_category', $this->idCategory);
            });

        // Query expenses
        $expenses = Expenses::query()
            ->select([
                'date',
                'id_category',
                'description',
                'amount',
                DB::raw("'expense' as type")
            ])
            ->when($this->fromDate, function ($query) {
                $query->whereDate('date', '>=', $this->fromDate);
            })
            ->when($this->toDate, function ($query) {
                $query->whereDate('date', '<=', $this->toDate);
            })
            ->when($this->idCategory, function ($query) {
                $query->where('id_category', $this->idCategory);
            });

        // Union incomes dan expenses
        // ->orderBy() hanya bisa di query builder sebelum union,
        // jadi kita pakai collection sortBy() nanti
        $union = $incomes->union($expenses)->get();

        // Eager load category (jika model incomes/expenses punya relasi "category")
        $union->load('category');

        // Sort by date ascending (karena union query builder sering tidak bisa pakai orderBy)
        $sorted = $union->sortBy('date')->values();

        return $sorted;
    }

    /**
     * Judul kolom di Excel.
     */
    public function headings(): array
    {
        return [
            'No',
            'Tanggal',
            'Kategori',
            'Keterangan',
            'Pemasukan',
            'Pengeluaran',
        ];
    }

    /**
     * Mapping setiap baris ke format kolom Excel.
     */
    public function map($row): array
    {
        // Increment rowNumber
        self::$rowNumber++;

        // Jika type = income → Pemasukan, else → Pengeluaran
        $pemasukan = $row->type === 'income' ? $row->amount : null;
        $pengeluaran = $row->type === 'expense' ? $row->amount : null;

        return [
            self::$rowNumber,
            $row->date,
            optional($row->category)->name_category ?? '-',
            $row->description ?? '-',
            $pemasukan ?? '-',
            $pengeluaran ?? '-',
        ];
    }
}
