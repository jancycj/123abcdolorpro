<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    
    public $appends = ['item','item_ob','unit', 'category'];
    /**
     * [Item]
     */
    public function getItemAttribute() {
       
        return Item::where('id',$this->item_id)->pluck('name')->first();

    }
    public function getItemObAttribute() {
       
        return Item::where('id',$this->item_id)->first();

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
}
