<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Minuman extends Model
{
    use HasFactory;

    protected $table = "minumans";

    protected $fillable = [
        "nama",
        "id_kategori",
        "gambar",
        "harga",
        "pilihan",
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori','id');
    }
}
