<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
    use HasFactory;

    // Inisialisasi Tabel
    protected $table = 'incomes'; // Nama tabel

    // Inisialisasi Primary Key
    protected $primaryKey = 'id_income'; // Primary key tabel

    // Disable Timestamps jika tidak menggunakan kolom created_at/updated_at
    public $timestamps = false;

    // Fillable: Kolom yang dapat diisi secara massal
    protected $fillable = [
        'amount', 'description', 'date', 'id_category', 'created_at',
    ];

    // Relasi ke Categories
    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category', 'id_category');
    }

    // Get All Data
    public static function getAll()
    {
        return self::all(); // Gunakan self untuk merujuk model saat ini
    }

    // Get Data by ID
    public static function getById($id)
    {
        return self::find($id); // find menggunakan primary key secara otomatis
    }

    // Insert Data
    public static function insert($data)
    {
        return self::create($data); // create menggunakan fillable
    }

    // Update Data
    public static function updateData($id_income, $data)
    {
        return self::where('id_income', $id_income)->update($data);
    }

    // Delete Data
    public static function deleteData($id): bool
    {
        $income = self::find($id); // Mencari data berdasarkan primary key

        if ($income) {
            return $income->delete(); // Menghapus data jika ditemukan
        }

        return false; // Jika data tidak ditemukan
    }

    // Total Incomes
    public static function totalIncomes()
    {
        return self::sum('amount'); // Menggunakan query builder untuk sum kolom
    }
}
