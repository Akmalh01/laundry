<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePaketTableForFixedPricing extends Migration
{
    public function up()
    {
        Schema::table('paket', function (Blueprint $table) {
            // Hapus kolom harga jika sudah ada
            $table->dropColumn('harga');

            // Tambahkan kolom baru
            $table->decimal('harga_tetap', 10, 2)->nullable(false); // Harga tetap untuk berat maksimum
            $table->integer('maksimum_berat')->nullable(false); // Maksimum berat dalam kg
        });
    }

    public function down()
    {
        Schema::table('paket', function (Blueprint $table) {
            // Kembalikan ke struktur semula jika rollback
            $table->decimal('harga', 10, 2)->nullable(false);
            $table->dropColumn(['harga_tetap', 'maksimum_berat']);
        });
    }
}
