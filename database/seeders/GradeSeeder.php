<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    public function run(): void
    {
        Grade::create([
            'id' => 1,
            'student_id' => 4,
            'teacher_id' => 3,
            'subject_id' => 6,
            'grade' => 1,
            'comment' => 'a',
            'created_at' => '2025-01-09 11:13:34',
            'updated_at' => '2025-01-09 11:16:00'
        ]);

        Grade::create([
            'id' => 2,
            'student_id' => 4,
            'teacher_id' => 3,
            'subject_id' => 6,
            'grade' => 5,
            'comment' => null,
            'created_at' => '2025-01-09 11:13:57',
            'updated_at' => '2025-01-09 11:13:57'
        ]);

        Grade::create([
            'id' => 3,
            'student_id' => 4,
            'teacher_id' => 3,
            'subject_id' => 7,
            'grade' => 5,
            'comment' => null,
            'created_at' => '2025-01-09 11:14:00',
            'updated_at' => '2025-01-09 11:14:00'
        ]);

        Grade::create([
            'id' => 4,
            'student_id' => 4,
            'teacher_id' => 3,
            'subject_id' => 5,
            'grade' => 6,
            'comment' => 'Bo jesteś dobry',
            'created_at' => '2025-01-09 11:14:04',
            'updated_at' => '2025-01-09 11:15:39'
        ]);
    }
}
