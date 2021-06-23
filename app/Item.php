<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    public $appends = ['unit', 'category','created_date','updated_date','default_supplier_name','default_supplier_code','parent_item'];
    
     /**
     * [Item]
     */
    public function getUnitAttribute() {
       
        return LookupMaster::where('id',$this->unit_id)->pluck('lookup_value')->first();

    }
     /**
     * [Item]
     */
    public function getDefaultSupplierNameAttribute() {
       
        return Costomers::where('id',$this->default_supplier)->pluck('name')->first();

    }
     /**
     * [Item]
     */
    public function getDefaultSupplierCodeAttribute() {
       
        return Costomers::where('id',$this->default_supplier)->pluck('customer_code')->first();

    }
     /**
     * [Item]
     */
    public function getCategoryAttribute() {
       
        return LookupMaster::where('id',$this->category_id)->pluck('lookup_value')->first();

    }
    /**
     * [Item]
     */
    public function getCreatedDateAttribute() {
       
        return date('d-m-Y', strtotime($this->created_at));

    }
    /**
     * [Item]
     */
    public function getUpdatedDateAttribute() {
       
        return date('d-m-Y', strtotime($this->updated_at));

    }
}
