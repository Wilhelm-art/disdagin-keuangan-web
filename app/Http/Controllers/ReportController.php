<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Incomes;
use App\Models\Category;
use App\Models\Expense;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::all();

        $reports = Incomes::query()
            ->when($request->from_date, function ($query) use ($request) {
                $query->whereDate('date', '>=', $request->from_date);
            })
            ->when($request->to_date, function ($query) use ($request) {
                $query->whereDate('date', '<=', $request->to_date);
            })
            ->when($request->category_id, function ($query) use ($request) {
                $query->where('id_category', $request->category_id);
            })
            ->with('category')
            ->get();

        return view('reports.index', compact('categories', 'reports'));
    }


    public function exportExcel(Request $request)
    {
        // Logic untuk ekspor Excel
    }

    public function print(Request $request)
    {
        // Logic untuk mencetak laporan
    }
}
