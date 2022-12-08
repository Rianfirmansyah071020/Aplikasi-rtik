<?php

namespace App\Models;

use App\Models\Anggota;
use App\Models\Pendaftar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'divisi'
    ];



    public function anggota() {
        return $this->hasOne(Anggota::class);
    }

    public function pedaftar() {
        return $this->hasOne(Pendaftar::class);
    }
}
