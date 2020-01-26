<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{

    public $appends = ['item','balance'];
    /**
     * [Item]
     */
    public function getItemAttribute() {
       
        return Item::where('id',$this->item_id)->pluck('name')->first();

    }
    
    /**
     * [Item]
     */
    public function getBalanceAttribute() {
       
       return $this->quantity - $this->recieved_quantity;

    }
    /*Schedule relation*/
    public function schedules()
    {
        return $this->hasMany('App\OrderSchedules','order_details_id');
    }
    /*Schedule relation*/
    public function reciept()
    {
        return $this->hasMany('App\OrderReceiptDetails','order_details_id')->whereIn('status',['pending','processing']);
    }
    /*Schedule relation*/
    public function completed_reciept()
    {
        return $this->hasMany('App\OrderReceiptDetails','order_details_id')->where('status','completed');
    }
     /*Schedule relation*/
     public function qc_details()
     {
         return $this->hasMany('App\OrderQCDetails','order_details_id');
     }
     /*Schedule relation*/
    public function order()
    {
        return $this->belongsTo('App\Order','order_id');
    }
}
