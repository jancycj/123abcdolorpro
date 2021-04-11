<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Costomers extends Model
{
    public $appends = ['username','user_id','country','country_name', 'district', 'district_name', 'state', 'state_name'];
    /**
     * [Item]
     */
    public function getCountryAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->country_id)->pluck('lookup_value')->first();

    }
    public function getCountryNameAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->country_id)->pluck('lookup_description')->first();

    }
    public function getDistrictAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->district_id)->pluck('lookup_value')->first();

    }
    public function getDistrictNameAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->district_id)->pluck('lookup_description')->first();

    }
    public function getStateAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->state_id)->pluck('lookup_value')->first();

    }
    public function getStateNameAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->state_id)->pluck('lookup_description')->first();

    }
    public function getUsernameAttribute() {
       
        return DB::table('users as u')
        ->join('customer_users as cu', 'u.id', '=', 'cu.user_id')
        ->where('cu.customer_id',$this->id)->pluck('u.username')->first();

    }

    public function getUserIdAttribute() {
       
        return DB::table('customer_users')
        ->where('customer_id',$this->id)->pluck('user_id')->first();

    }
}
