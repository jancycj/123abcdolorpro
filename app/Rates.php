<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    //
    public $appends = ['item','pm_unit', 'pr_unit','customer','quantity'];
    /**
     * [Item]
     */
    public function getItemAttribute() {
       
        return Item::where('id',Stock::where('id',$this->item_id)->pluck('item_id')->first())->pluck('name')->first();

    }
    public function getQuantityAttribute() {
       
        return Stock::where('id',$this->item_id)->pluck('quantity')->first();

    }
    public function getPmUnitAttribute() {
       
        return LookupMaster::where('id',$this->primary_unit)->pluck('lookup_value')->first();

    }
    public function getPrUnitAttribute() {
       
        return LookupMaster::where('id',$this->purchase_unit)->pluck('lookup_value')->first();

    }
    public function getCustomerAttribute() {
       
        return Costomers::where('id',$this->customer_id)->pluck('name')->first();

    }
}
