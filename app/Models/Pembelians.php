<?php

namespace App\Models;

use App\Models\User;
use App\Models\Details;
use App\Models\Customers;
use Illuminate\Database\Eloquent\Model;

class Pembelians extends Model
{
    protected $fillable = [
        'total_harga',
        'total_bayar',
        'total_kembalian',
        'poin',
        'total_poin',
        'tanggal_pembelian',
        'user_id',
        'customer_id',
    ];

    public function details(){
        return $this->hasMany(Details::class, 'pembelian_id');
    }
    public function users(){
       return $this->belongsTo(User::class, 'user_id');
    }
    public function customer(){
       return $this->belongsTo(Customers::class, 'customer_id');
    }
}
