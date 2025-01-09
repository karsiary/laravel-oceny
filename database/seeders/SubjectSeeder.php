<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        Subject::create([
            'id' => 1,
            'name' => 'Matematyka',
            'description' => 'Przedmiot obejmujący algebrę i geometrię',
            'created_at' => '2025-01-09 10:32:15',
            'updated_at' => '2025-01-09 10:32:15'
        ]);

        Subject::create([
            'id' => 2,
            'name' => 'Język Polski',
            'description' => 'Przedmiot obejmujący literaturę i gramatykę',
            'created_at' => '2025-01-09 10:32:15',
            'updated_at' => '2025-01-09 10:32:15'
        ]);

        Subject::create([
            'id' => 3,
            'name' => 'Język Angielski',
            'description' => 'Nauka języka angielskiego',
            'created_at' => '2025-01-09 10:32:15',
            'updated_at' => '2025-01-09 10:32:15'
        ]);

        Subject::create([
            'id' => 4,
            'name' => 'Historia',
            'description' => 'Historia Polski i świata',
            'created_at' => '2025-01-09 10:32:15',
            'updated_at' => '2025-01-09 10:32:15'
        ]);

        Subject::create([
            'id' => 5,
            'name' => 'Biologia',
            'description' => 'Nauka o organizmach żywych',
            'created_at' => '2025-01-09 10:32:15',
            'updated_at' => '2025-01-09 10:32:15'
        ]);

        Subject::create([
            'id' => 6,
            'name' => 'Chemia',
            'description' => 'Nauka o substancjach i ich przemianach',
            'created_at' => '2025-01-09 10:32:15',
            'updated_at' => '2025-01-09 10:32:15'
        ]);

        Subject::create([
            'id' => 7,
            'name' => 'Fizyka',
            'description' => 'Nauka o zjawiskach fizycznych',
            'created_at' => '2025-01-09 10:32:15',
            'updated_at' => '2025-01-09 10:32:15'
        ]);

        Subject::create([
            'id' => 8,
            'name' => 'Geografia',
            'description' => 'Nauka o Ziemi i zjawiskach geograficznych',
            'created_at' => '2025-01-09 10:32:15',
            'updated_at' => '2025-01-09 10:32:15'
        ]);
    }
}
