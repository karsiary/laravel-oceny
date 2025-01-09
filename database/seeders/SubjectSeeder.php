<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            ['name' => 'Matematyka', 'description' => 'Przedmiot obejmujący algebrę i geometrię'],
            ['name' => 'Język Polski', 'description' => 'Przedmiot obejmujący literaturę i gramatykę'],
            ['name' => 'Język Angielski', 'description' => 'Nauka języka angielskiego'],
            ['name' => 'Historia', 'description' => 'Historia Polski i świata'],
            ['name' => 'Biologia', 'description' => 'Nauka o organizmach żywych'],
            ['name' => 'Chemia', 'description' => 'Nauka o substancjach i ich przemianach'],
            ['name' => 'Fizyka', 'description' => 'Nauka o zjawiskach fizycznych'],
            ['name' => 'Geografia', 'description' => 'Nauka o Ziemi i zjawiskach geograficznych'],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
} 