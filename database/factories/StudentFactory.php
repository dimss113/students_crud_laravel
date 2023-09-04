<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
// use faker
use Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker\Factory::create();
        return [
            'name' => $faker->name(),
            // using laravel helper
            'gender' => Arr::random(['L', 'P']),
            'nrp' => mt_rand(0000001, 99999999),
            'class_id' => Arr::random([1, 2, 3, 4])
        ];
    }
}