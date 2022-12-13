<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Minuman;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "minuman_id",
        "nama",
        "meja",
        "jumlah",
        "total_harga",
        "status"
    ];

    public function minuman()
    {
        return $this->belongsTo(Minuman::class,"minuman_id","id");
    }
}
