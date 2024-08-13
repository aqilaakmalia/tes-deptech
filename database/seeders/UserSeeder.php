<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'admin@example.com',
                'birthdate' => '1990-01-01',
                'gender' => 'male',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()
            ],
            [
                'first_name' => 'Aqilah',
                'last_name' => 'Akmalia',
                'email' => 'aqila@gmail.com',
                'birthdate' => '2001-09-18',
                'gender' => 'female',
                'password' => Hash::make('admin2'),
                'created_at' => Carbon::now()
            ],
            [
                'first_name' => 'Robert',
                'last_name' => 'Brown',
                'email' => 'robert@gmail.com',
                'birthdate' => '1978-11-22',
                'gender' => 'male',
                'password' => Hash::make('admin3'),
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
