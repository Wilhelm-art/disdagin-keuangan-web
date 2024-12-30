<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    // Inisialisasi Tabel
    protected $table = 'expenses';
    protected $primaryKey = 'id_expense'; // Nama kolom primary key
    public $timestamps = false;

    // Fillable Fields
    protected $fillable = [
        'amount', 'description', 'date', 'id_category', 'created_at',
    ];

    // Relasi ke tabel Categories
    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category', 'id_category');
    }

    // Mendapatkan semua data pengeluaran
    public static function getAll()
    {
        return self::with('category')->get(); // Tambahkan relasi kategori
    }

    // Mendapatkan data berdasarkan ID
    public static function getById($id)
    {
        return self::with('category')->where('id_expense', $id)->first();
    }

    // Insert Data
    public static function insert($data)
    {
        // Kurangi saldo kategori yang bersangkutan
        $amount = $data['amount'];

        $category = Categories::find($data['id_category']);
        if (!$category) {
            return false; // Return false jika kategori tidak ditemukan
        }

        $categoryBalance = $category->getCategoryBalance();
        if ($categoryBalance < $amount) {
            // Return false jika saldo kategori tidak cukup
            return false;
        }

        // Tambahkan pengeluaran baru
        $expense = self::create($data);

        // Update saldo kategori (misalnya, kurangi saldo di tabel lain jika diperlukan)
        // Tambahkan logika Anda di sini

        return $expense;
    }

    // Total Pengeluaran
    public static function totalExpenses()
    {
        return self::sum('amount'); // Gunakan fungsi agregat Laravel
    }

    // Hapus Data Berdasarkan ID
    public static function deleteData($id): bool
    {
        $expense = self::find($id);

        if ($expense) {
            return $expense->delete();
        }

        return false;
    }

    // Mendapatkan Total Pengeluaran Berdasarkan Kategori
    public static function getTotalByCategory($id_category)
    {
        return self::where('id_category', $id_category)->sum('amount');
    }
}
