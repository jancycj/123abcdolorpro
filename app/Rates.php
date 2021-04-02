<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rates extends Model
{
    //
    public $appends = ['item','item_name','pm_unit','stock_unit','purchase_unit', 'pr_unit','customer','supplier_name','supplier_code','quantity','part_no',];
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
    public function getQuantityAttribute() {
       
        return Stock::where('id',$this->item_id)->pluck('quantity')->first();

    }
    public function getPmUnitAttribute() {
       
        return LookupMaster::where('id',$this->primary_unit)->pluck('lookup_value')->first();

    }
    public function getStockUnitAttribute() {
       
        return LookupMaster::where('id',$this->stock_unit_id)->pluck('lookup_value')->first();

    }
    public function getPurchaseUnitAttribute() {
       
        return LookupMaster::where('id',$this->purchase_unit_id)->pluck('lookup_value')->first();

    }
    public function getPrUnitAttribute() {
       
        return LookupMaster::where('id',$this->purchase_unit)->pluck('lookup_value')->first();

    }
    public function getCustomerAttribute() {
       
        return Costomers::where('id',$this->supplier_id)->pluck('name')->first();

    }
    public function getSupplierNameAttribute() {
       
        return Costomers::where('id',$this->supplier_id)->pluck('name')->first();

    }
    public function getSupplierCodeAttribute() {
       
        return Costomers::where('id',$this->supplier_id)->pluck('customer_code')->first();

    }
    
}
