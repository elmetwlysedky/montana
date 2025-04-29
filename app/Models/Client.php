<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'phone');

    public function orders()
    {
        return $this->hasMany(' App\Models\Order', 'client_id');
    }

}