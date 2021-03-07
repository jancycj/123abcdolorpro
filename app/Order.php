<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public $appends = ['ship_to',
        'ship_to_name',
        'bill_to_company_name',
        'supplier_name',
        'supplier_code',
        'order_no',
        'quotation_no',
        'department',
        'department_name',
    ];
    /**
     * [Item]
     */
    public function getDepartmentAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->department_id)->pluck('lookup_value')->first();

    }
     /**
     * [Item]
     */
    public function getDepartmentNameAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->department_id)->pluck('lookup_description')->first();

    }
    /**
     * [Item]
     */
    public function getShipToNameAttribute() {
       
        return Company::where('id',$this->shipto_customer_id)->pluck('name')->first();

    }
    /**
     * [Item]
     */
    public function getShipToAttribute() {
       
        return Company::where('id',$this->shipto_customer_id)->pluck('company_code')->first();

    }
    /**
     * [Item]
     */
    public function getQuotationNoAttribute() {
       
        return $this->quote_ref_no;

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
    public function getSupplierCodeAttribute() {
       
        return Costomers::where('id',$this->supplier_id)->pluck('customer_code')->first();

    }
    /**
     * [Item]
     */
    public function getSupplierNameAttribute() {
       
        return Costomers::where('id',$this->supplier_id)->pluck('name')->first();

    }
    public function getOrderNoAttribute() {
       
        return $this->order_number;

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
