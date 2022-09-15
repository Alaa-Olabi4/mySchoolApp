<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marks')->insert([
            'student_id'=>1,
            'teacher_id'=>1,
            'value'=>100
        ]);

        DB::table('marks')->insert([
            'student_id'=>1,
            'teacher_id'=>2,
            'value'=>68
        ]);


        DB::table('marks')->insert([
            'student_id'=>1,
            'teacher_id'=>3,
            'value'=>74
        ]);


        DB::table('marks')->insert([
            'student_id'=>2,
            'teacher_id'=>1,
            'value'=>100
        ]);


        DB::table('marks')->insert([
            'student_id'=>2,
            'teacher_id'=>2,
            'value'=>42
        ]);


        DB::table('marks')->insert([
            'student_id'=>2,
            'teacher_id'=>3,
            'value'=>88
        ]);


        DB::table('marks')->insert([
            'student_id'=>3,
            'teacher_id'=>1,
            'value'=>92
        ]);


        DB::table('marks')->insert([
            'student_id'=>3,
            'teacher_id'=>2,
            'value'=>75
        ]);

    }
}
