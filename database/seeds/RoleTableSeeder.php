<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('roles')->insert([
            ['name' => 'superadmin','description'    =>'Super admin role'],
            ['name' => 'admin','description'         =>'Admin role'],
            ['name' => 'employee','description' =>'employee'],
            ['name' => 'costomer','description'     =>'costomer'],
        ]);
    }
}
