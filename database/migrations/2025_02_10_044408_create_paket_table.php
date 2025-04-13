<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketTable extends Migration
{
    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->id(); // Kolom id (INT, PRIMARY KEY, AUTO_INCREMENT)
            $table->string('nama_paket', 100)->nullable(false); // Kolom nama_paket (VARCHAR(100), NOT NULL)
            $table->enum('jenis_layanan', ['cuci', 'setrika', 'cuci&setrika'])->nullable(false); // Kolom jenis_layanan (ENUM, NOT NULL)
            $table->decimal('harga', 10, 2)->nullable(false); // Kolom harga (DECIMAL(10,2), NOT NULL)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('paket');
    }
}
