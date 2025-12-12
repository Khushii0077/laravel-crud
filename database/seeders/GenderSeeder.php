<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    public function run(): void
    {
        Gender::insert([
            ['is_male' => 1, 'created_at'=>now(), 'updated_at'=>now()],
            ['is_male' => 0, 'created_at'=>now(), 'updated_at'=>now()],
        ]);
    }
}
