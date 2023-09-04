<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Schema;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ClassRoom::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'name' => '1A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '1B',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '1C',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '1D',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach ($data as $key => $value) {
            ClassRoom::insert($value);
        }

        // ClassRoom::insert([
        //     'name' => 'Aiu',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
    }
}