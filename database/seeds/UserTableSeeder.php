<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            ['name' => 'testAdmin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$oMk.IOY4TADcxiP2Hs9ed.QuwqrX8OdMNqpyR5nihFyXXN.G68DfK',
            'remember_token' => '4XNh1YbcnAbyAfL412lBO0rWUPvbO4oXxcfocGOgNJFi9ND4sRUIJOptneMa'],
            
        ]);
    }
}
