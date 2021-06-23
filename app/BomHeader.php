<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BomHeader extends Model
{

    protected $table = 'bom_header';
    public $appends = ['parent_name'];
 

    public function items()
    {
        return $this->hasMany('App\BOMEntry','header_id');
    }

     public function getParentNameAttribute() {
       
       return DB::table('items')->where('id',$this->parent_item_id)->pluck('name')->first();
       
    }
}
