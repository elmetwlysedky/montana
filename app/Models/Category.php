<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    protected $fillable = array('name', 'image');
    public $timestamps = true;

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id');
    }


}
