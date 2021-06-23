<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SalesQuotationDetails extends Model
{
     protected $table = 'sales_quotation_details';

     public $appends = ['item','quantity','purchase_unit','part_no'];

    public function getItemAttribute() {
       
       return DB::table('items')->where('id',$this->item_id)->pluck('name')->first();
       
    }
     public function getPartNoAttribute() {
       
       return DB::table('items')->where('id',$this->item_id)->pluck('part_no')->first();
       
    }
     public function getQuantityAttribute() {
       
        return $this->qty;

    }
    public function getPurchaseUnitAttribute() {
       
        return $this->uom;

    }
    
   
}
