<?php

namespace App\Models;

use App\Models\Akun;
use App\Models\Agama;
use App\Models\Divisi;
use App\Models\Status;
use App\Models\Artikel;
use App\Models\Angkatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'divisi_id',
        'status_id',
        'agama_id',
        'angkatan_id',
        'nohp',
        'nim',
        'nama',
        'tempat_lahir',
        'tgl_th_lahir',
        'jekel',
        'alamat',
        'tahun_masuk',
        'tahun_selesai',
        'gambar'
    ];


    public function divisi() {
        return $this->belongsTo(Divisi::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function agama() {
        return $this->belongsTo(Agama::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }

    public function artikel() {
        return $this->hasOne(Artikel::class);
    }

    public function angkatan() {
        return $this->belongsTo(Angkatan::class);
    }

}
