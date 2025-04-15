<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    public $fillable = [
        'pembelian_id',
        'qty',
        'sub_total',
        'produk_id'
    ];
}
