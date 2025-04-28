<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konser extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tikets';
    protected $fillable = [
        'nama_pemesan',
        'email',
        'nama_konser',
        'tanggal_konser',
        'jumlah_tiket',
        'kategori_tiket',
        'status_pemesanan',
    ];
}
