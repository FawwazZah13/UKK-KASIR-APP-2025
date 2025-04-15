<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    public $fillable = [
        'name',
        'no_tlp',
        'poin',
        'status_customer'
    ];
}
