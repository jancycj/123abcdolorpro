<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WorkOrderDetails extends Model
{
    protected $table = 'workorder_detail';
    public $appends = ['name'];

    public function getNameAttribute() {
       
       return DB::table('items')->where('part_no',$this->part_no)->pluck('name')->first();
       
    }
}
