<?php

namespace App\Exports;

use App\Models\Incomes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromCollection, WithHeadings
{
    protected $fromDate;
    protected $toDate;
    protected $idCategory;

    public function __construct(Request $request)
    {
        $this->fromDate = $request->from_date;
        $this->toDate = $request->to_date;
        $this->idCategory = $request->id_category;
    }

    public function collection()
    {
        // Filter laporan berdasarkan input
        $reports = Incomes::query()
            ->select(['date', 'id_category', 'description', 'amount'])
            ->when($this->fromDate, function ($query) {
                $query->whereDate('date', '>=', $this->fromDate);
            })
            ->when($this->toDate, function ($query) {
                $query->whereDate('date', '<=', $this->toDate);
            })
            ->when($this->idCategory, function ($query) {
                $query->where('id_category', $this->idCategory);
            })
            ->with('category') // Pastikan relasi dengan kategori sudah didefinisikan di model
            ->get();

        // Ubah data untuk keperluan Excel
        return $reports->map(function ($report) {
            return [
                'Tanggal' => $report->date,
                'Kategori' => $report->category->name_category ?? '-', // Pastikan nama kategori aman
                'Keterangan' => $report->description,
                'Jumlah' => $report->amount,
            ];
        });
    }

    public function headings(): array
    {
        return ['Tanggal', 'Kategori', 'Keterangan', 'Jumlah'];
    }
}
