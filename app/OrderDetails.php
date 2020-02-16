<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{

    public $appends = ['item','balance','recieved_balance'];
    /**
     * [Item]
     */
    public function getItemAttribute() {
       
        return Item::where('id',Stock::where('id',$this->item_id)->pluck('item_id')->first())->pluck('name')->first();

    }
    
    /**
     * [Item]
     */
    public function getBalanceAttribute() {
       
       return $this->quantity - $this->recieved_quantity;

    }

    /**
     * [Item]
     */
    public function getRecievedBalanceAttribute() {
       
        return $this->recieved_quantity - ($this->accepted_quantity+$this->rejected_quantity+$this->rework_quantity);
 
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
    // public function stock_update()
    // {
    //     return $this->hasMany('App\OrderReceiptDetails','order_details_id')->where('status','completed');
    // }
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

    public static function save_recieved_qty($id,$qty)
    {
        $order_detail = OrderDetails::find($id);
        $order_detail->recieved_quantity = isset($qty)?
        $order_detail->recieved_quantity + $qty: $order_detail->recieved_quantity;
        $order_detail->save();
    }

    public static function save_accepted_qty($id,$qty)
    {
        $order_detail = OrderDetails::find($id);
        $order_detail->accepted_quantity = isset($qty)?
        $order_detail->accepted_quantity + $qty: $order_detail->accepted_quantity;
        $order_detail->save();
    }

    public static function save_rejected_qty($id,$qty)
    {
        $order_detail = OrderDetails::find($id);
        $order_detail->rejected_quantity = isset($qty)?
        $order_detail->rejected_quantity + $qty: $order_detail->rejected_quantity;
        $order_detail->save();
    }

    public static function save_rework_qty($id,$qty)
    {
        $order_detail = OrderDetails::find($id);
        $order_detail->rework_quantity = isset($qty)?
        $order_detail->rework_quantity + $qty: $order_detail->rework_quantity;
        $order_detail->save();
    }
}
