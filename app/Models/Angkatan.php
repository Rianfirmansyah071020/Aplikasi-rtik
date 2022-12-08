<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'angkatan'
    ];

    public function anggota() {
        return $this->hasOne(Anggota::class);
    }
}