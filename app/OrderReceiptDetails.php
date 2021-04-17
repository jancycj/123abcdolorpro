<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderReceiptDetails extends Model
{
    

    public $appends = [
        'balance',
        'item',
        'item_name',
        'part_no',
        'recieved_qty'
    ];
    
    /**
     * [Item]
     */
    public function getBalanceAttribute() {
       
        return $this->recieved_quantity - ($this->rework_quantity+$this->accepted_quantity+$this->rejected_quantity);
 
    }
    public function getRecievedQtyAttribute() {
       
        return $this->recieved_quantity;

    }
    public function getItemAttribute() {
       
        return Item::where('id',$this->item_id)->pluck('name')->first();

    }
    public function getItemNameAttribute() {
       
        return Item::where('id',$this->item_id)->pluck('name')->first();

    }
    public function getPartNoAttribute() {
       
        return Item::where('id',$this->item_id)->pluck('part_no')->first();

    }
     /*Schedule relation*/
     public function order_details()
     {
         return $this->belongsTo('App\OrderDetails','order_details_id');
     }

     public static function save_recieved_qty($id,$qty)
    {
        $order_detail = OrderReceiptDetails::find($id);
        $order_detail->recieved_quantity = isset($qty)?
        $order_detail->recieved_quantity + $qty: $order_detail->recieved_quantity;
        $order_detail->save();
    }

    public static  function save_accepted_qty($id,$qty)
    {
        $order_detail = OrderReceiptDetails::find($id);
        $order_detail->accepted_quantity = isset($qty)?
        $order_detail->accepted_quantity + $qty: $order_detail->accepted_quantity;
        $order_detail->save();
    }

    public static  function save_rejected_qty($id,$qty)
    {
        $order_detail = OrderReceiptDetails::find($id);
        $order_detail->rejected_quantity = isset($qty)?
        $order_detail->rejected_quantity + $qty: $order_detail->rejected_quantity;
        $order_detail->save();
    }

    public static  function save_rework_qty($id,$qty)
    {
        $order_detail = OrderReceiptDetails::find($id);
        $order_detail->rework_quantity = isset($qty)?
        $order_detail->rework_quantity + $qty: $order_detail->rework_quantity;
        $order_detail->save();
    }

    public static function check_completed($id)
    {
        $order_detail = OrderReceiptDetails::find($id);
        if($order_detail->balance == 0){
            $order_detail->status = 'completed';
            $order_detail->save();
        }
    }
}
