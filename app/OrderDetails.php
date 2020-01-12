<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{

    public $appends = ['item'];
    /**
     * [Item]
     */
    public function getItemAttribute() {
       
        return Item::where('id',$this->item_id)->pluck('name')->first();

    }
    /*Schedule relation*/
    public function schedules()
    {
        return $this->hasMany('App\OrderSchedules','order_details_id');
    }
}
