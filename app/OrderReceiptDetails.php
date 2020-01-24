<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderReceiptDetails extends Model
{
    
    
     /*Schedule relation*/
     public function order_details()
     {
         return $this->belongsTo('App\OrderDetails','order_details_id');
     }
}
