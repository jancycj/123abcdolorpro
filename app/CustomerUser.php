<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerUser extends Model
{
    public $appends = ['user'];
    
     /**
     * [Item]
     */
    public function getUserAttribute() {
       
        return User::where('id',$this->user_id)->first();

    }
}
