<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'jenis_pelanggaran',
        'tanggal_pelanggaran',
        'type',
        'deskripsi',
        'catatan_hrd', // Pastikan kolom ini ada di fillable
    ];
}
