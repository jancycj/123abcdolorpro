<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    
    public $appends = ['item','unit', 'category'];
    /**
     * [Item]
     */
    public function getItemAttribute() {
       
        return Item::where('id',$this->item_id)->pluck('name')->first();

    }
     /**
     * [Item]
     */
    public function getUnitAttribute() {
       
        return 'NO';

    }
     /**
     * [Item]
     */
    public function getCategoryAttribute() {
       
        return 'Dyed';

    }
}
