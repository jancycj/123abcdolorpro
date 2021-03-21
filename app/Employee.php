<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Employee extends Model
{
    public $appends = [
        'blood_group_name' ,
        'blood_group' ,
        'status_name' ,
        'status' ,
        'department_name' ,
        'department' ,
        'section' ,
        'section_name' ,
        'designation' ,
        'designation_name' ,
        'class' ,
        'class_name' ,
        'district' ,
        'district_name' ,
        'state' ,
        'state_name' ,
        'country' ,
        'country_name' ,
        'name' ,
    ];

    /**
     * [Item]
     */
    public function getNameAttribute() {
       
        return $this->employee_name;

    }
    /**
     * [Item]
     */
    public function getBloodGroupAttribute() {
    
        return DB::table('lookup_masters')->where('id',$this->blood_group_id)->pluck('lookup_value')->first();

    }
    /**
     * [Item]
     */
    public function getBloodGroupNameAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->blood_group_id)->pluck('lookup_description')->first();

    }

    /**
     * [Item]
     */
    public function getStatusAttribute() {
    
        return DB::table('lookup_masters')->where('id',$this->status_id)->pluck('lookup_value')->first();

    }
    /**
     * [Item]
     */
    public function getStatusNameAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->status_id)->pluck('lookup_description')->first();

    }

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
    public function getSectionAttribute() {
    
        return DB::table('lookup_masters')->where('id',$this->section_id)->pluck('lookup_value')->first();

    }
    /**
     * [Item]
     */
    public function getSectionNameAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->section_id)->pluck('lookup_description')->first();

    }

    /**
     * [Item]
     */
    public function getDesignationAttribute() {
    
        return DB::table('lookup_masters')->where('id',$this->designation_id)->pluck('lookup_value')->first();

    }
    /**
     * [Item]
     */
    public function getDesignationNameAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->designation_id)->pluck('lookup_description')->first();

    }
    /**
     * [Item]
     */
    public function getClassAttribute() {
    
        return DB::table('lookup_masters')->where('id',$this->class_id)->pluck('lookup_value')->first();

    }
    /**
     * [Item]
     */
    public function getClassNameAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->class_id)->pluck('lookup_description')->first();

    }
     /**
     * [Item]
     */
    public function getDistrictAttribute() {
    
        return DB::table('lookup_masters')->where('id',$this->district_id)->pluck('lookup_value')->first();

    }
    /**
     * [Item]
     */
    public function getDistrictNameAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->district_id)->pluck('lookup_description')->first();

    }
     /**
     * [Item]
     */
    public function getStateAttribute() {
    
        return DB::table('lookup_masters')->where('id',$this->state_id)->pluck('lookup_value')->first();

    }
    /**
     * [Item]
     */
    public function getStateNameAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->state_id)->pluck('lookup_description')->first();

    }
    /**
     * [Item]
     */
    public function getCountryAttribute() {
    
        return DB::table('lookup_masters')->where('id',$this->country_id)->pluck('lookup_value')->first();

    }
    /**
     * [Item]
     */
    public function getCountryNameAttribute() {
       
        return DB::table('lookup_masters')->where('id',$this->country_id)->pluck('lookup_description')->first();

    }
}
