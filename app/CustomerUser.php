<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerUser extends Model
{
    public $appends = ['user','customer'];
    
     /**
     * [Item]
     */
    public function getUserAttribute() {
       
        return User::where('id',$this->user_id)->first();

    }
    
     /**
     * [Item]
     */
    public function getCustomerAttribute() {
       
        return Costomers::where('id',$this->customer_id)->first();

    }
}
