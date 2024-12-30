<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('total_amount', 15, 2);
            $table->decimal('used_amount', 15, 2)->default(0);
            $table->unsignedBigInteger('id_category'); // Nama kolom diubah menjadi 'id_category'
            $table->timestamps();

            // Foreign key ke tabel categories
            $table->foreign('id_category')->references('id_category')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
}
