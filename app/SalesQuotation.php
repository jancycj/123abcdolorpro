<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SalesQuotation extends Model
{
     protected $table = 'sales_quotation';
     public $appends = ['customer_name','courier_amount'];

    

    public function getCustomerNameAttribute() {
       
       return DB::table('costomers')->where('id',$this->customer_id)->pluck('name')->first();
       
    }
     public function items()
    {
        return $this->hasMany('App\SalesQuotationDetails','header_id');
    }

    public function getCourierAmountAttribute() {
       
        return $this->courier_charge;

    }
}
