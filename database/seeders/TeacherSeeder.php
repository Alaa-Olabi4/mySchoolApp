<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'user_id'=>2,
            'subject_id'=>1
        ]);

        DB::table('teachers')->insert([
            'user_id'=>3,
            'subject_id'=>2
        ]);


        DB::table('teachers')->insert([
            'user_id'=>4,
            'subject_id'=>3
        ]);

    }
}
