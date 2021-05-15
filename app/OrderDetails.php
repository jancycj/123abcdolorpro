<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{

    public $appends = [
        'item',
        'item_part_no',
        'part_no',
        'item_hsn','balance',
        'recieved_balance',
        'order_no',
        'pending_amount',
        'unit',
        'discount_rate',
        'pm_unit',
        'date',
        'primary_unit',
        'purchase_unit'
    ];
    /**
     * [Item]
     */
    public function getItemAttribute() {
       
        return Item::where('id',Stock::where('id',$this->item_id)->pluck('item_id')->first())->pluck('name')->first();

    }
    /**
     * [Item]
     */
    public function getPrimaryUnitAttribute() {
       
        return $this->primary_unit_id;

    }
     /**
     * [Item]
     */
    public function getPurchaseUnitAttribute() {
       
        return $this->purchase_unit_id;

    }
     /**
     * [Item]
     */
    public function getDateAttribute() {
       
        return $this->delivery_date;

    }
    public function getItemPartNoAttribute() {
       
        return Item::where('id',Stock::where('id',$this->item_id)->pluck('item_id')->first())->pluck('part_no')->first();

    }
    public function getPartNoAttribute() {
       
        return Item::where('id',Stock::where('id',$this->item_id)->pluck('item_id')->first())->pluck('part_no')->first();

    }
    public function getItemHsnAttribute() {
       
        return Item::where('id',Stock::where('id',$this->item_id)->pluck('item_id')->first())->pluck('hsn_code')->first();

    }
    public function getOrderNoAttribute() {
       
        return Order::where('id',$this->order_id)->pluck('order_number')->first();

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
    public function getPendingAmountAttribute() {
       
        $qty = $this->quantity - $this->recieved_quantity;
        $total = $qty*$this->rate;

        if($this->discount){
            $total = $total - ($total*$this->discount/100);

        }
        return $total;

 
    }
    /**
     * [Item]
     */
    public function getDiscountRateAttribute() {
       
        $total = $this->rate;

        if($this->discount){
            $total = $this->rate - ($this->rate*$this->discount/100);

        }
        return $total;

 
    }

    /**
     * [Item]
     */
    public function getRecievedBalanceAttribute() {
       
        return $this->recieved_quantity - ($this->accepted_quantity+$this->rejected_quantity+$this->rework_quantity);
 
     }

    public function getUnitAttribute() {
       
        return LookupMaster::where('id',$this->purchase_unit_id)->pluck('lookup_value')->first();

    }
    public function getPmUnitAttribute() {
       
        return LookupMaster::where('id',$this->purchase_unit_id)->pluck('lookup_value')->first();

    }
    
    /*Schedule relation*/
    public function schedules()
    {
        return $this->hasMany('App\OrderSchedules','order_details_id');
    }
    /*Schedule relation*/
    public function reciept()
    {
        return $this->hasMany('App\OrderReceiptDetails','order_detail_id')->whereIn('status',['pending','processing']);
    }
    /*Schedule relation*/
    public function exact_reciept()
    {
        return $this->hasMany('App\OrderReceiptDetails','order_detail_id');
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
