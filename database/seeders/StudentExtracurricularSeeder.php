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
                'student_id' => 1,
                'extracurricular_id' => 1,
                'start_year' => 2020
            ],
            [
                'student_id' => 1,
                'extracurricular_id' => 2,
                'start_year' => 2023
            ],
            [
                'student_id' => 2,
                'extracurricular_id' => 1,
                'start_year' => 2024
            ],
            [
                'student_id' => 2, 
                'extracurricular_id' => 3, 
                'start_year' => 2021
            ],
            [
                'student_id' => 2,
                'extracurricular_id' => 4, 
                'start_year' => 2022
            ],
            [
                'student_id' => 3, 
                'extracurricular_id' => 5, 
                'start_year' => 2023
            ],
            [
                'student_id' => 3,
                'extracurricular_id' => 6, 
                'start_year' => 2024
            ],
            [
                'student_id' => 4, 
                'extracurricular_id' => 7, 
                'start_year' => 2021
            ],
            [
                'student_id' => 4,
                'extracurricular_id' => 8, 
                'start_year' => 2022
            ],
            [
                'student_id' => 5, 
                'extracurricular_id' => 9, 
                'start_year' => 2023
            ],
            [
                'student_id' => 5,
                'extracurricular_id' => 10, 
                'start_year' => 2024
            ],
            [
                'student_id' => 6, 
                'extracurricular_id' => 1, 
                'start_year' => 2022
            ],
            [
                'student_id' => 6,
                'extracurricular_id' => 3, 
                'start_year' => 2023
            ],
        ];

        DB::table('student_extracurricular')->insert($studentExtracurriculars);
    }
}
