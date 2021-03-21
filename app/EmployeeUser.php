<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeUser extends Model
{
    public $appends = ['user','company','name'];
    
     /**
     * [Item]
     */
    public function getUserAttribute() {
       
        return User::where('id',$this->user_id)->first();

    }
     /**
     * [Item]
     */
    public function getNameAttribute() {
       
        return User::where('id',$this->user_id)->pluck('name')->first();

    }
    
     /**
     * [Item]
     */
    public function getCompanyAttribute() {
       
        return Employee::where('id',$this->employee_id)->first();

    }
}
