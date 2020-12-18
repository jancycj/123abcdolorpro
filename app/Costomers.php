<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Costomers extends Model
{
    public $appends = ['country','country_name', 'district', 'district_name', 'state', 'state_name'];
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
}
