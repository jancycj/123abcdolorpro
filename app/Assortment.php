<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Assortment extends Model
{
    public $appends = ['customer_name','customer_code'];
    /**
     * [Item]
     */
    public function getCustomerNameAttribute() {
       
        return DB::table('costomers')->where('id',$this->customer_id)->pluck('name')->first();

    }
    public function getCustomerCodeAttribute() {
       
        return DB::table('costomers')->where('id',$this->customer_id)->pluck('short_name')->first();

    }

    public function assortment_shades()
    {
        return $this->hasMany('App\AssortmentShade','assortment_id');
    }
}
