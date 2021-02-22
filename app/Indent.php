<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Indent extends Model
{
    public $appends = ['section','section_des','family','family_des','indent_date'];

    public function getSectionAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->department)->pluck('lookup_value')->first();

    }
    public function getSectionDesAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->department)->pluck('lookup_description')->first();

    }
    public function getFamilyAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->product_group)->pluck('lookup_description')->first();

    }
    public function getFamilyDesAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->product_group)->pluck('lookup_description')->first();

    }
    public function getIndentDateAttribute() {
       
        return $this->request_date;

    }
    public function items()
    {
        return $this->hasMany('App\IndentDetails','request_id');
    }
}
