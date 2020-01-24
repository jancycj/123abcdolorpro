<?php

use Illuminate\Database\Seeder;

class Lookupseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lookup_masters')->insert([
            ['lookup_key' => 'Master','lookup_value'    =>'UNIT','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'ITEM CATEGORY','lookup_description'    =>'item table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'SEX','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'CURRENCY','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'COUNTRY','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'TAX','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'DEPARTMENT','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'PURCHASE ORDER TERMS','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'EARNING AND DEDUCTION','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'EMPLOYEE STATUS','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'COUNTER','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'COMPONENT OPERATIONS','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'STORE','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'PRODUCT CATEGORY','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'BIN TRANSACTIONS','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'CLIENT REGION','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'BANK','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'MACHINE MODEL','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'DOCUMENT THROUGH','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'MODE OF DESPATCH','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'PURCHASE ORDER SHORT CLOSE RESON','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'DISTRICTS','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'STATES','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'CUSTOMER CLASS','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
               ['lookup_key' => 'Master','lookup_value'    =>'MODE OF DISPATCH','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'MODE OF PAYMENT','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'TYPE OF CONE','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'TUBE SIZE','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'MODE OF ENQUIRY','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'PRODUCT FAMILY','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'MACHINE LOCATION','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'MARTIAL STATUS','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'EMPLOYEE CLASS','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'SPARE ORDER TYPE','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'DESIGNATION','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'CROSSING RATIO','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'RELIGION','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'VENDOR CLASS','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'BLOOD GROUP','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'MACHINE COLOR','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'TRAY','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'THREAD GUIDES','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'ITEMS STATUS','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'MOTOR','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'LUBRICATING SYSTEM','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'NO OF LAYS','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'TYPE OF PACKING','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'CONTROLS','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'PULLY ','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],

        ]);
    }
}