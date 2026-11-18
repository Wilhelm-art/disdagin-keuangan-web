<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    // Show All Data
    public function index()
    {
        $categories = Categories::orderBy('id_category', 'asc')->paginate(10);
        return view('dashboard.categories.list', compact('categories'));
    }

    // Goto Add Data Page
    public function addPage()
    {
        $title = "Tambah Kategori";
        return view('dashboard.categories.add', compact('title'));
    }

    // Insert & Send Data to Model
    public function insert(Request $request)
    {
        $request->validate([
            'name_category' => 'required|string|max:100',
        ]);

        $data = [
            'name_category' => $request->name_category
        ];

        Categories::insert($data);
        return redirect()->route('categories')->with('success', 'Data berhasil ditambahkan!');
    }

    // Go to Edit Data Page
    public function editPage($id)
    {
        $title = "Edit Kategori";
        $category = Categories::getById($id);
        if (!$category) {
            return redirect()->route('categories')->with('error', 'Kategori tidak ditemukan!');
        }
        return view('dashboard.categories.edit', compact('title', 'category'));
    }

    // Update Data via Model
    public function update(Request $request, $id_category)
    {
        $request->validate([
            'name_category' => 'required|string|max:100',
        ]);

        $data = [
            'name_category' => $request->name_category
        ];

        Categories::updateData($id_category, $data);
        return redirect()->route('categories')->with('success', 'Data berhasil diubah!');
    }

    // Delete Data
    public function delete($id)
    {
        try {
            Categories::deleteData($id);
            return redirect()->route('categories')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('categories')->with('error', 'Kategori tidak dapat dihapus karena masih digunakan pada data transaksi.');
        }
    }
}
