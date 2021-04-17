<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class OrderReceiptHeader extends Model
{
    //
    public $appends = [
        'other_charges',
        'vendor_code',
        'vendor_name'
    ];
    public function getOtherChargesAttribute() {
        return $this->p_and_f;
    }
    public function getVendorCodeAttribute() {
        return $vendor = DB::table('costomers')->where('id',$this->vendor_id)->pluck('customer_code')->first();
    }
    public function getVendorNameAttribute() {
        return $vendor = DB::table('costomers')->where('id',$this->vendor_id)->pluck('name')->first();
    }
}
