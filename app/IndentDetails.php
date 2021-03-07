<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class IndentDetails extends Model
{
    public $appends = ['part_no','name','unit','qty','unit_id'];

    public function getNameAttribute() {
       
        return DB::table('items')->where('id',$this->item_id)->pluck('name')->first();

    }
    public function getPartNoAttribute() {
       
        return DB::table('items')->where('id',$this->item_id)->pluck('part_no')->first();

    }
    /**
     * [Item]
     */
    public function getUnitAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->uom)->pluck('lookup_value')->first();

    }
    public function getQtyAttribute() {
       
        return $this->quantity;

    }
    public function getUnitIdAttribute() {
       
        return $this->uom;

    }
}
