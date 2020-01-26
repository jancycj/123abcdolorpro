<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    /*details relation*/
    public function details()
    {
        return $this->hasMany('App\OrderDetails','order_id')->whereIn('status',['processing','pending']);
    }

    /*details relation*/
    public function completed()
    {
        return $this->hasMany('App\OrderDetails','order_id')->where('status','completed');
    }
}
