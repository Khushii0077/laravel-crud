<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CourseSeeder::class,
            GenderSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
