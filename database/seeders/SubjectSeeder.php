<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        Subject::insert([
    ['subject_name'=>'Mathematics','created_at'=>now(),'updated_at'=>now()],
    ['subject_name'=>'Physics','created_at'=>now(),'updated_at'=>now()],
    ['subject_name'=>'Computer Science','created_at'=>now(),'updated_at'=>now()],
    ['subject_name'=>'English','created_at'=>now(),'updated_at'=>now()],
]);


    }
}
