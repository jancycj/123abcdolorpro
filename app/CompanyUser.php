<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyUser extends Model
{
    public $appends = ['company'];
    
     /**
     * [Item]
     */
    public function getCompanyAttribute() {
       
        return Company::where('id',$this->company_id)->first();

    }
}
