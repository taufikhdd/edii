<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nama_kadis',
        'nip_kadis',
        'pangkatgol_kadis',
        'alamat',
        'telp',
        'kode_pos',
    ];

    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }

    public function lapmingguans()
    {
        return $this->hasMany(Lapmingguan::class);
    }
}
