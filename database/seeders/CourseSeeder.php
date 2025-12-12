<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::insert([
            ['course_name' => 'BCA', 'created_at'=>now(),'updated_at'=>now()],
            ['course_name' => 'BSc IT', 'created_at'=>now(),'updated_at'=>now()],
            ['course_name' => 'BCom', 'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
