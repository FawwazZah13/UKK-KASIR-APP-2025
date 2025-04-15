<?php

namespace App\Models;

use App\Models\Produks;
use App\Models\Pembelians;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    public $fillable = [
        'pembelian_id',
        'qty',
        'sub_total',
        'produk_id'
    ];
    public function pembelian() { return $this->belongsTo(Pembelians::class); }
    public function produk() { return $this->belongsTo(Produks::class); }
}
