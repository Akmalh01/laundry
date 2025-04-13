<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';

    protected $fillable = [
        'nama_paket',
        'jenis_layanan',
        'harga_tetap',
        'maksimum_berat',
    ];

    // Fungsi untuk menghitung harga total berdasarkan berat
    public function calculateTotalPrice($berat)
    {
        if ($berat <= $this->maksimum_berat) {
            // Jika berat tidak melebihi maksimum, gunakan harga tetap
            return $this->harga_tetap;
        } else {
            // Jika berat melebihi maksimum, hitung sebagai dua kali harga tetap
            return $this->harga_tetap * 2;
        }
    }
}
