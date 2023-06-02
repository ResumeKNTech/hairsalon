<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[];

        for($i=1;$i<=3;$i++){
           $data[]=[
            'name' => "Anh Khoa".$i,
            'email' => 'khoahero'.$i.'@gmail.com',
            'password' => Hash::make('password'),
           ];
        }
        DB::table('users')->insert($data);
    }
}
