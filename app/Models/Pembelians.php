<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelians extends Model
{
    public $fillable = [
        'total_harga',
        'total_bayar',
        'total_kembalian',
        'poin',
        'total_poin',
        'tanggal_pembelian',
        'user_id',
        'customer_id'

    ];
}
