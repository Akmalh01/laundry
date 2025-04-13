<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskonTable extends Migration
{
    public function up()
    {
        Schema::create('diskon', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_pencucian')->nullable(false); // Jumlah pencucian untuk mendapatkan diskon
            $table->foreignId('id_paket_gratis')->nullable()->constrained('paket')->onDelete('set null'); // Paket gratis
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diskon');
    }
}
