<?php

namespace App\Models;

use App\Models\Artikel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori'
    ];


    public function artikel() {
        return $this->belongsTo(Artikel::class);
    }
}
