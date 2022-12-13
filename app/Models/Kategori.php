<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Minuman;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
        "gambar"
    ];

    public function minuman()
    {
        return $this->hasMany(Minuman::class, 'id', 'id_kategori');
    }
}
