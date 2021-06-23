<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SalesEnquiry extends Model
{
    protected $table = 'sales_enquiry';
      public $appends = ['customer_name','registered_by_name'];
 
    public function items()
    {
        return $this->hasMany('App\SalesEnquiryDetails','header_id');
    }


     public function getCustomerNameAttribute() {
       
       return DB::table('costomers')->where('id',$this->customer_id)->pluck('name')->first();
       
    }
    public function getRegisteredByNameAttribute() {
       
       return DB::table('employees')->where('employee_code',$this->registerd_by)->pluck('employee_name')->first();
       
    }
}
