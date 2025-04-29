<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'price', 'price_of_sale', 'quantity', 'description', 'category_id');

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_id')->withPivot('price','quantity');
    }

}
