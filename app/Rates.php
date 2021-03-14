<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rates extends Model
{
    //
    public $appends = ['item','pm_unit', 'pr_unit','customer','quantity','part_no'];
    /**
     * [Item]
     */
    public function getItemAttribute() {
       
        return Item::where('id',Stock::where('id',$this->item_id)->pluck('item_id')->first())->pluck('name')->first();

    }
    public function getPartNoAttribute() {
       
        return Item::where('id',Stock::where('id',$this->item_id)->pluck('item_id')->first())->pluck('part_no')->first();

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
    public function getRateAttribute($value) {
        $currency = DB::table('lookup_masters')->where('lookup_value',$this->currency_id)->pluck('genaral_value')->first();
        $currency = $currency != null ? $currency : 1;

        isset($this->conversion_factor)?$this->conversion_factor:1;
        return $value * $currency * $this->conversion_factor;

    }
}
