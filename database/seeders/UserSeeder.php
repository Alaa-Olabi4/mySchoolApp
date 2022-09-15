<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Teachers
        DB::table('users')->insert([
            'FirstName'=>'Mostafa',
            'LastName'=>'Mostafa',
            'Kind'=>'teacher',
            'email'=>'mostafa@gmail.com',
            'password'=>hash::make('mostafamostafa'),
        ]);

        DB::table('users')->insert([
            'FirstName'=>'Mhd',
            'LastName'=>'Mhd',
            'Kind'=>'teacher',
            'email'=>'mhd@gmail.com',
            'password'=>hash::make('mhdmhdmhd'),
        ]);

        DB::table('users')->insert([
            'FirstName'=>'Ahmad',
            'LastName'=>'Ahmad',
            'Kind'=>'teacher',
            'email'=>'Ahmad@gmail.com',
            'password'=>hash::make('ahmadahmad'),
        ]);

        // Students
        DB::table('users')->insert([
            'FirstName'=>'Qasem',
            'LastName'=>'Qasem',
            'Kind'=>'student',
            'email'=>'qasem@gmail.com',
            'password'=>hash::make('qasemqasem'),
        ]);

        DB::table('users')->insert([
            'FirstName'=>'Waleed',
            'LastName'=>'Waleed',
            'Kind'=>'student',
            'email'=>'waleed@gmail.com',
            'password'=>hash::make('waleedwaleed'),
        ]);

        DB::table('users')->insert([
            'FirstName'=>'Wael',
            'LastName'=>'Wael',
            'Kind'=>'student',
            'email'=>'wael@gmail.com',
            'password'=>hash::make('waelwael'),
        ]);

        DB::table('users')->insert([
            'FirstName'=>'Omar',
            'LastName'=>'Omar',
            'Kind'=>'student',
            'email'=>'omar@gmail.com',
            'password'=>hash::make('omaromar'),
        ]);

        DB::table('users')->insert([
            'FirstName'=>'Saeed',
            'LastName'=>'Saeed',
            'Kind'=>'student',
            'email'=>'saeed@gmail.com',
            'password'=>hash::make('saeedsaeed'),
        ]);
    }
}
