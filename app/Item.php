<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    public $appends = ['unit', 'category'];
    
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
       
        return LookupMaster::where('id',$this->category_id)->pluck('lookup_value')->first();

    }
}
