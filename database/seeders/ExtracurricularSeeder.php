<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExtracurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('extracurriculars')->insert([
            [
                'name' => 'Basketball',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Music Club',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Debate Team',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Drama Club',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Art Club',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Robotics',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Coding Club',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Swimming',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Dance Club',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Photography',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
