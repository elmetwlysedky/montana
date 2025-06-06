<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model 
{

    protected $table = 'order_products';
    public $timestamps = true;
    protected $fillable = array('product_id', 'order_id', 'price', 'quantity');

}