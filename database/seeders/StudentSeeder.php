<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Schema;
use App\Models\ClassRoom;
use Carbon\Carbon;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // Student::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     [
        //         'name' => 'Dimas Fadilah',
        //         'class_id' => 1,
        //         'nrp' => '5025211014',
        //         'gender' => 'L',
        //     ],
        //     [
        //         'name' => 'Ayu Putri',
        //         'class_id' => 2,
        //         'nrp' => '5025211111',
        //         'gender' => 'P',
        //     ],
        //     [
        //         'name' => 'Rizky Ananda',
        //         'class_id' => 3,
        //         'nrp' => '5025211011',
        //         'gender' => 'L',
        //     ],
        //     [
        //         'name' => 'Rizky Khairani',
        //         'class_id' => 4,
        //         'nrp' => '5025211090',
        //         'gender' => 'P',
        //     ]
        // ];

        // foreach ($data as $student) {
        //     Student::insert([
        //         'name' => $student['name'],
        //         'class_id' => $student['class_id'],
        //         'nrp' => $student['nrp'],
        //         'gender' => $student['gender'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        // }

        Student::factory()->count(20)->create();

    }
}