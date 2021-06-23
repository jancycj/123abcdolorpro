<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WorkOrder extends Model
{
    protected $table = 'workorder_header';

    public function items()
    {
        return $this->hasMany('App\WorkOrderDetails','header_id');
    }
}
