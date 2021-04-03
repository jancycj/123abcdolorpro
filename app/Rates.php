<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rates extends Model
{
    //
    public $appends = [
     'item',
     'item_name',
     'stock_unit',
     'purchase_unit',
     'supplier_name',
     'supplier_code',
     'part_no',
     'basic_rate',
     'rate_with_exchange'
    ];
    /**
     * [Item]
     */
    public function getItemAttribute() {
       
        return Item::where('id',$this->item_id)->pluck('name')->first();

    }
    public function getItemNameAttribute() {
       
        return Item::where('id',$this->item_id)->pluck('name')->first();

    }
    public function getPartNoAttribute() {
       
        return Item::where('id',$this->item_id)->pluck('part_no')->first();

    }
    
    public function getStockUnitAttribute() {
       
        return LookupMaster::where('id',$this->stock_unit_id)->pluck('lookup_value')->first();

    }
    public function getPurchaseUnitAttribute() {
       
        return LookupMaster::where('id',$this->purchase_unit_id)->pluck('lookup_value')->first();

    }
    public function getSupplierNameAttribute() {
       
        return Costomers::where('id',$this->supplier_id)->pluck('name')->first();

    }
    public function getSupplierCodeAttribute() {
       
        return Costomers::where('id',$this->supplier_id)->pluck('customer_code')->first();

    }
    public function getBasicRateAttribute() {
        return $this->rate;
    }
    public function getRateWithExchangeAttribute() {
        return $this->rate * $this->exchange_rate * $this->conversion_factor * $this->item_weight;
    }
    
}
