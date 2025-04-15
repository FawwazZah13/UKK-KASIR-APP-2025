<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produks extends Model
{
    public $fillable = [
        'nama_produk',
        'harga',
        'stok',
        'gambar'
    ];
}
