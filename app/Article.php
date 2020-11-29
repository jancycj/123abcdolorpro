<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
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
}
