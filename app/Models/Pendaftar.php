<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'divisi_id',
        'agama_id',
        'nohp',
        'nim',
        'nama',
        'tempat_lahir',
        'tgl_th_lahir',
        'jekel',
        'alamat',
        'tujuan',
        'tahun_masuk',
        'gambar'
    ];


    public function divisi() {
        return $this->belongsTo(Divisi::class);
    }

    public function agama() {
        return $this->belongsTo(Agama::class);
    }
}
