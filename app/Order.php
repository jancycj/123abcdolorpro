<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $appends = ['ship_to_company_name','bill_to_company_name','supplier_name'];
    /**
     * [Item]
     */
    public function getShipToCompanyNameAttribute() {
       
        return Company::where('id',$this->shipto_customer_id)->pluck('name')->first();

    }
    /**
     * [Item]
     */
    public function getBillToCompanyNameAttribute() {
       
        return Company::where('id',$this->billto_customer_id)->pluck('name')->first();

    }
    /**
     * [Item]
     */
    public function getSupplierNameAttribute() {
       
        return Costomers::where('id',$this->suppier_id)->pluck('name')->first();

    }
    /*details relation*/
    public function exact_details()
    {
        return $this->hasMany('App\OrderDetails','order_id');
    }

    /*details relation*/
    public function details()
    {
        return $this->hasMany('App\OrderDetails','order_id')->whereIn('status',['processing','pending']);
    }

    /*details relation*/
    public function completed()
    {
        return $this->hasMany('App\OrderDetails','order_id')->where('status','completed');
    }
    

    /*details relation*/
    public function ship_to()
    {
        return $this->belongsTo('App\Costomers','shipto_customer_id');
    }
    /*details relation*/
    public function bill_to()
    {
        return $this->belongsTo('App\Costomers','billto_customer_id');
    }
}
