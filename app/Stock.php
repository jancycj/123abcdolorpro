<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    
    public $appends = ['item','item_ob','unit', 'category','value'];
    /**
     * [Item]
     */
    public function getItemAttribute() {
       
        return Item::where('id',$this->item_id)->pluck('name')->first();

    }
    public function getItemObAttribute() {
       
        return Item::where('id',$this->item_id)->first();

    }

    public function getValueAttribute() {
       
        $item = Item::where('id',$this->item_id)->first();
        $total = $item->list_price *  $this->quantity;
        return $total;

    }

     /**
     * [Item]
     */
    public function getUnitAttribute() {
       
        return LookupMaster::where('id',$this->unit_id)->pluck('lookup_value')->first();

    }
     /**
     * [Item]
     */
    public function getCategoryAttribute() {
       
        // return LookupMaster::where('id',$this->category_id)->pluck('lookup_value')->first();
        return 'null';

    }

    /*details relation*/
    public function item()
    {
        return $this->belongsTo('App\Item','item_id');
    }
}
