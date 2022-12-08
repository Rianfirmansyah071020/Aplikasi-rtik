<?php

namespace App\Models;

use App\Models\Anggota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];


    public function anggota() {
        return $this->hasOne(Anggota::class);
    }
}
