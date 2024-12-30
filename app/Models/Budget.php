<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    /**
     * Tabel yang digunakan.
     */
    protected $table = 'budgets';

    /**
     * Kolom yang dapat diisi (fillable).
     */
    protected $fillable = [
        'name',
        'description',
        'total_amount',
        'used_amount',
    ];

    /**
     * Kolom yang memiliki tipe data khusus.
     */
    protected $casts = [
        'total_amount' => 'float',
        'used_amount' => 'float',
    ];

    /**
     * Relasi ke tabel kategori.
     */
    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category', 'id_category');
    }

    /**
     * Relasi ke tabel pemasukan (incomes).
     */
    public function incomes()
    {
        return $this->hasMany(Incomes::class, 'id_budget', 'id');
    }

    /**
     * Menghitung sisa anggaran (remaining amount).
     *
     * @return float
     */
    public function remainingAmount(): float
    {
        return max(0, $this->total_amount - $this->used_amount); // Tidak boleh negatif
    }

    /**
     * Mengecek apakah pemasukan dapat ditambahkan tanpa melebihi anggaran.
     *
     * @param float $amount
     * @return bool
     */
    public function canAddIncome(float $amount): bool
    {
        return $this->remainingAmount() >= $amount;
    }

    /**
     * Menambah jumlah penggunaan anggaran (used amount).
     *
     * @param float $amount
     * @return void
     */
    public function addUsedAmount(float $amount): void
    {
        $this->increment('used_amount', $amount);
    }

    /**
     * Mengurangi jumlah penggunaan anggaran (used amount).
     *
     * @param float $amount
     * @return void
     */
    public function reduceUsedAmount(float $amount): void
    {
        $this->decrement('used_amount', $amount);
    }
}
