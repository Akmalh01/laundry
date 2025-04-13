<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;

    protected $table = 'diskon';

    protected $fillable = [
        'jumlah_pencucian',
        'id_paket_gratis',
    ];

    // Relasi ke paket gratis
    public function paketGratis()
    {
        return $this->belongsTo(Paket::class, 'id_paket_gratis');
    }
}
