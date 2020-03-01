<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderQCDetails extends Model
{
    
public $appends = ['qc_value','qc_parameter','qc_tollarence'];
    /**
     * [Item]
     */
    public function getQcValueAttribute() {
       
        return QCPlan::where('id',$this->qc_plan_id)->pluck('qc_value')->first();

    }
    public function getQcParameterAttribute() {
       
        return QCPlan::where('id',$this->qc_plan_id)->pluck('qc_parameter')->first();

    }
    public function getQcTollarenceAttribute() {
       
        return QCPlan::where('id',$this->qc_plan_id)->pluck('qc_tollarence')->first();

    }
}
