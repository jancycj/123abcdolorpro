<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AssortmentShade extends Model
{
    public $appends = ['shade_code','colour','sl_no'];
    /**
     * [Item]
     */
    public function getShadeCodeAttribute() {
       
        return DB::table('shades')->where('id',$this->shade_id)->pluck('name')->first();

    }
    public function getColourAttribute() {
       
        return DB::table('shades')->where('id',$this->shade_id)->pluck('colour')->first();

    }
    public function getSlNoAttribute() {
       
        return $this->id;

    }
}
