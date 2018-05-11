<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::Table('users')->insert(array (
        	['NIS'=>'112','nama'=>'admin','level'=>'0','alamat'=>'pku','telp'=>'0812','ayah'=>'','ibu'=>'','angkatan'=>'','password'=>Hash::make('passadmin')]));

    }
}
