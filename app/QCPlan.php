<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QCPlan extends Model
{
    public $appends = ['item'];
    /**
     * [Item]
     */
    public function getItemAttribute() {
       
        return Item::where('id',Stock::where('id',$this->item_id)->pluck('item_id')->first())->pluck('name')->first();

    }
}
