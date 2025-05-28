<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('notes', 'total_price', 'delivery_price', 'subtotal', 'status', 'address','client_id','payment','discount','user_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'order_products')->withPivot('price','quantity');
    }

}
