<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_paket')->constrained('paket')->onDelete('cascade');
            $table->string('nama_pelanggan', 100)->nullable(false);
            $table->string('nomor_wa', 15)->nullable();
            $table->decimal('berat', 10, 2)->nullable(false);
            $table->decimal('total_harga', 10, 2)->nullable(false);
            $table->enum('status', ['dalam proses', 'selesai'])->default('dalam proses');
            $table->timestamp('tanggal_pesanan')->default(now());
            $table->timestamp('estimasi_selesai')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
