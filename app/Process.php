<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    
    public $appends = ['item'];
    /**
     * [Item]
     */
    public function getItemAttribute() {
       
        return Item::where('id',$this->item_id)->pluck('name')->first();

    }
}
