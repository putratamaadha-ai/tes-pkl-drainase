<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drainase extends Model
{
    use HasFactory;

    protected $table = 'drainase';
    protected $fillable = [
        'kelurahan_id',
        'nama_lokasi',
        'panjang_meter',
        'lebar_cm',
        'jenis_drainase',
        'kondisi',
        'tahun_pendataan',
        'keterangan',
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
}