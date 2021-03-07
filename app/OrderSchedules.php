<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderSchedules extends Model
{
    public $appends = [
        'date',
    ];
    /**
     * [Item]
     */
    public function getDateAttribute() {
       
        return $this->delivery_date;

    }
}
