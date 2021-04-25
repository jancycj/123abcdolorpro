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
        'vendor_name',
        'vendor_address',
        'vendor_post_code',
        'vendor_place',
        'vendor_gst_no',
        'vendor_phone_number',
    ];
   
    
    public function getOtherChargesAttribute() {
        return $this->p_and_f;
    }
    public function getVendorCodeAttribute() {
        return  DB::table('costomers')->where('id',$this->vendor_id)->pluck('customer_code')->first();
    }
    public function getVendorNameAttribute() {
        return  DB::table('costomers')->where('id',$this->vendor_id)->pluck('name')->first();
    }
    public function getVendorAddressAttribute() {
       $vendor =  DB::table('costomers')->where('id',$this->vendor_id)->first();
        return  $vendor->address_line1.'<br>'.$vendor->address_line2;
    }
    public function getVendorPostCodeAttribute() {
        return  DB::table('costomers')->where('id',$this->vendor_id)->pluck('post_code')->first();
    }
    public function getVendorPlaceAttribute() {
        return  DB::table('costomers')->where('id',$this->vendor_id)->pluck('place')->first();
    }
    public function getVendorGstNoAttribute() {
        return  DB::table('costomers')->where('id',$this->vendor_id)->pluck('gst_no')->first();
    }
    public function getVendorPhoneNumberAttribute() {
        return  DB::table('costomers')->where('id',$this->vendor_id)->pluck('phone_number')->first();
    }
}
