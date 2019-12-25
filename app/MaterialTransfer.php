<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialTransfer extends Model
{
    public $appends = ['item','unit', 'category','from_company','to_company'];
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
    /**
     * [Item]
     */
    public function getfromCompanyAttribute() {
       
        return Company::where('id',$this->ship_from)->pluck('name')->first();

    }
    /**
     * [Item]
     */
    public function getToCompanyAttribute() {
       
        return Company::where('id',$this->ship_to)->pluck('name')->first();

    }
}
