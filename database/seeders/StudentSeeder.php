<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Subject;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $s1 = Student::create([
            'name' => 'John Doe',
            'age' => 20,
            'email' => 'john@example.com',
            'course_id' => 1,
            'skills' => ['PHP', 'Laravel', 'JavaScript'],
            'gender_id' => 1,
        ]);

        $s2 = Student::create([
            'name' => 'Alice Smith',
            'age' => 22,
            'email' => 'alice@example.com',
            'course_id' => 2,
            'skills' => ['HTML', 'CSS', 'React'],
            'gender_id' => 2,
        ]);

        // Attach subjects (IDs assumed from SubjectSeeder)
        $s1->subjects()->attach([1, 3]); // Maths, Computer Science
        $s2->subjects()->attach([3, 4]); // Computer Science, English
    }
}
