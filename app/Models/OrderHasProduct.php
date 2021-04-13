<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHasProduct extends Model
{
    protected $fillable = [
        'order_id',
        'client_id',
        'customer_id',
        'product_id',
        'value',
        'qtd'
    ];
}
