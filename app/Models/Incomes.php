<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan.
     */
    protected $table = 'incomes';

    /**
     * Primary key tabel.
     */
    protected $primaryKey = 'id_income';

    /**
     * Nonaktifkan timestamp jika tidak digunakan.
     */
    public $timestamps = false;

    /**
     * Kolom yang dapat diisi secara massal.
     */
    protected $fillable = [
        'amount', 'description', 'date', 'id_category', 'id_budget', 'created_at',
    ];

    /**
     * Relasi ke tabel `categories`.
     */
    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category', 'id_category');
    }

    /**
     * Relasi ke tabel `budgets`.
     */
    public function budget()
    {
        return $this->belongsTo(Budget::class, 'id_budget', 'id');
    }

    /**
     * Mendapatkan semua data pemasukan.
     */
    public static function getAll()
    {
        return self::with(['category', 'budget'])->get();
    }

    /**
     * Mendapatkan data pemasukan berdasarkan ID.
     */
    public static function getById($id)
    {
        return self::with(['category', 'budget'])->find($id);
    }

    /**
     * Menambahkan data pemasukan baru.
     */
    public static function insert($data)
    {
        // Validasi anggaran
        $budget = Budget::find($data['id_budget']);
        if (!$budget) {
            throw new \Exception('Anggaran tidak ditemukan.');
        }

        if (!$budget->canAddIncome($data['amount'])) {
            throw new \Exception('Jumlah pemasukan melebihi anggaran yang tersedia.');
        }

        // Tambahkan pemasukan
        $income = self::create($data);

        // Perbarui jumlah penggunaan anggaran
        $budget->addUsedAmount($data['amount']);

        return $income;
    }

    /**
     * Memperbarui data pemasukan.
     */
    public static function updateData($id_income, $data)
    {
        $income = self::find($id_income);

        if (!$income) {
            throw new \Exception('Data pemasukan tidak ditemukan.');
        }

        $budget = Budget::find($data['id_budget']);
        if (!$budget) {
            throw new \Exception('Anggaran tidak ditemukan.');
        }

        // Jika ID budget berbeda, lakukan penyesuaian
        if ($income->id_budget != $data['id_budget']) {
            $oldBudget = Budget::find($income->id_budget);
            if ($oldBudget) {
                $oldBudget->reduceUsedAmount($income->amount);
            }

            if (!$budget->canAddIncome($data['amount'])) {
                throw new \Exception('Jumlah pemasukan melebihi anggaran yang tersedia.');
            }

            $budget->addUsedAmount($data['amount']);
        } else {
            // Hitung selisih pemasukan baru dan lama
            $difference = $data['amount'] - $income->amount;

            if ($difference > 0 && !$budget->canAddIncome($difference)) {
                throw new \Exception('Jumlah pemasukan baru melebihi anggaran yang tersedia.');
            }

            // Perbarui penggunaan anggaran
            if ($difference > 0) {
                $budget->addUsedAmount($difference);
            } else {
                $budget->reduceUsedAmount(abs($difference));
            }
        }

        // Perbarui data pemasukan
        $income->update($data);

        return $income;
    }

    /**
     * Menghapus data pemasukan.
     */
    public static function deleteData($id): bool
    {
        $income = self::find($id);

        if ($income) {
            $budget = $income->budget;

            if ($budget) {
                $budget->reduceUsedAmount($income->amount); // Kurangi anggaran sesuai jumlah pemasukan
            }

            return $income->delete();
        }

        return false;
    }

    /**
     * Menghitung total pemasukan.
     */
    public static function totalIncomes()
    {
        return self::sum('amount');
    }

    /**
     * Validasi apakah jumlah pemasukan tidak melebihi anggaran.
     */
    public static function validateAmount($id_budget, $amount): bool
    {
        $budget = Budget::find($id_budget);

        return $budget && $budget->canAddIncome($amount);
    }

    /**
     * Menghitung total pemasukan berdasarkan kategori.
     */
    public static function getTotalByCategory($id_category)
    {
        return self::where('id_category', $id_category)->sum('amount');
    }
}
