<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapmingguan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function instansis()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id');
    }

    public function bulans()
    {
        return $this->belongsTo(Bulan::class, 'bulan');
    }
}
