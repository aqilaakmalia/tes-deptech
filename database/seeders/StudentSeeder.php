<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            [
                'first_name' => 'Alice',
                'last_name' => 'Smith',
                'phone_number' => '081234567890',
                'student_number' => '123456',
                'address' => 'Jl. Sudirman No. 1',
                'gender' => 'female',
                'photo' => 'assets/img/avatars/1.png',
                'created_at' => Carbon::now()
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Johnson',
                'phone_number' => '081234567891',
                'student_number' => '123457',
                'address' => 'Jl. Thamrin No. 2',
                'gender' => 'male',
                'photo' => 'assets/img/avatars/2.png',
                'created_at' => Carbon::now()
            ],
            [
                'first_name' => 'Charlie',
                'last_name' => 'Williams',
                'phone_number' => '081234567892',
                'student_number' => '123458',
                'address' => 'Jl. Merdeka No. 3',
                'gender' => 'male',
                'photo' => 'assets/img/avatars/3.png',
                'created_at' => Carbon::now()
            ],
            [
                'first_name' => 'Diana',
                'last_name' => 'Brown',
                'phone_number' => '081234567893',
                'student_number' => '123459',
                'address' => 'Jl. Sudirman No. 4',
                'gender' => 'female',
                'photo' => 'assets/img/avatars/4.png',
                'created_at' => Carbon::now()
            ],
            [
                'first_name' => 'Eve',
                'last_name' => 'Davis',
                'phone_number' => '081234567894',
                'student_number' => '123460',
                'address' => 'Jl. Thamrin No. 5',
                'gender' => 'female',
                'photo' => 'assets/img/avatars/5.png',
                'created_at' => Carbon::now()
            ],
            [
                'first_name' => 'Frank',
                'last_name' => 'Miller',
                'phone_number' => '081234567895',
                'student_number' => '123461',
                'address' => 'Jl. Merdeka No. 6',
                'gender' => 'male',
                'photo' => 'assets/img/avatars/6.png',
                'created_at' => Carbon::now()
            ],
            [
                'first_name' => 'Grace',
                'last_name' => 'Wilson',
                'phone_number' => '081234567896',
                'student_number' => '123462',
                'address' => 'Jl. Sudirman No. 7',
                'gender' => 'male',
                'photo' => 'assets/img/avatars/7.png',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
