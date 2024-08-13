<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentExtracurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studentExtracurriculars = [
            [
                'student_id' => 1, // ID siswa yang pertama
                'extracurricular_id' => 1, // ID ekstrakurikuler yang pertama
                'start_year' => 2020
            ],
            [
                'student_id' => 1,
                'extracurricular_id' => 2, // ID ekstrakurikuler yang kedua
                'start_year' => 2023
            ],
            [
                'student_id' => 2, // ID siswa yang kedua
                'extracurricular_id' => 1,
                'start_year' => 2024
            ],
        ];

        DB::table('student_extracurricular')->insert($studentExtracurriculars);
    }
}
