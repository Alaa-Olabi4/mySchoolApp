<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'user_id'=>5
        ]);

        DB::table('students')->insert([
            'user_id'=>6
        ]);

        DB::table('students')->insert([
            'user_id'=>7
        ]);

        DB::table('students')->insert([
            'user_id'=>8
        ]);

        DB::table('students')->insert([
            'user_id'=>9
        ]);

        
    }
}
