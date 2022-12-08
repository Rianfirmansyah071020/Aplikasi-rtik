<?php

namespace App\Models;

use App\Models\Anggota;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'anggota_id',
        'kategori_id',
        'judul',
        'ringkasan',
        'isi',
        'gambar'
    ];

    public function kategori() {
        return $this->hasOne(Kategori::class);
    }

    public function anggota() {
        return $this->belongsTo(Anggota::class);
    }
}
