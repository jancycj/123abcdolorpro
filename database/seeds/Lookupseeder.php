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
            ['lookup_key' => 'Master','lookup_value'    =>'SEX','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'CURRENCY','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'COUNTRY','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'TAX','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
            ['lookup_key' => 'Master','lookup_value'    =>'DEPARTMENT','lookup_description'    =>'unit table','genaral_value'    =>'unit table'],
        ]);
    }
}



