<?php

namespace App\Models;

use App\Models\Anggota;
use App\Models\Pendaftar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agama extends Model
{
    use HasFactory;

    protected $fillable = [
        'agama'
    ];


    public function anggota() {
        return $this->hasOne(Anggota::class);
    }

    public function pendaftar() {
        return $this->hasOne(Pendaftar::class);

    }
}
