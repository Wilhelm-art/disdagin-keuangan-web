<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_budget')->nullable()->after('id_category'); // Tambahkan kolom id_budget
            $table->foreign('id_budget')->references('id')->on('budgets')->onDelete('cascade'); // Relasi ke tabel budgets
        });
    }

    public function down()
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->dropForeign(['id_budget']); // Hapus foreign key
            $table->dropColumn('id_budget');   // Hapus kolom id_budget
        });
    }

};
