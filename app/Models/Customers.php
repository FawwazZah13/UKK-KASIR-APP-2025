<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = [
        'name',
        'no_tlp',
        'poin',
        'status_customer',
    ];

    public function pembelian(){
        return $this->hasMany(Pembelians::class, 'customer_id');
    }
}
