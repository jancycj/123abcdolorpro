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

    /*details relation*/
    public function ship_to()
    {
        return $this->belongsTo('App\Costomers','shipto_customer_id');
    }
    /*details relation*/
    public function bill_to()
    {
        return $this->belongsTo('App\Costomers','billto_customer_id');
    }
}
