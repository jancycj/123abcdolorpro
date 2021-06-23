<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BOMEntry extends Model
{
    protected $table = 'product_structure';
   
    public $appends = ['child_name'];

    public function getChildNameAttribute() {
       
       return DB::table('items')->where('id',$this->child_item_id)->pluck('name')->first();
       
    }
    
  
}
