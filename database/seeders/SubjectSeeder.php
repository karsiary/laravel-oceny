<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        Subject::create({
    "id": 1,
    "name": "Matematyka",
    "description": "Przedmiot obejmuj\u0105cy algebr\u0119 i geometri\u0119",
    "created_at": "2025-01-09 10:32:15",
    "updated_at": "2025-01-09 10:32:15"
});
        Subject::create({
    "id": 2,
    "name": "J\u0119zyk Polski",
    "description": "Przedmiot obejmuj\u0105cy literatur\u0119 i gramatyk\u0119",
    "created_at": "2025-01-09 10:32:15",
    "updated_at": "2025-01-09 10:32:15"
});
        Subject::create({
    "id": 3,
    "name": "J\u0119zyk Angielski",
    "description": "Nauka j\u0119zyka angielskiego",
    "created_at": "2025-01-09 10:32:15",
    "updated_at": "2025-01-09 10:32:15"
});
        Subject::create({
    "id": 4,
    "name": "Historia",
    "description": "Historia Polski i \u015bwiata",
    "created_at": "2025-01-09 10:32:15",
    "updated_at": "2025-01-09 10:32:15"
});
        Subject::create({
    "id": 5,
    "name": "Biologia",
    "description": "Nauka o organizmach \u017cywych",
    "created_at": "2025-01-09 10:32:15",
    "updated_at": "2025-01-09 10:32:15"
});
        Subject::create({
    "id": 6,
    "name": "Chemia",
    "description": "Nauka o substancjach i ich przemianach",
    "created_at": "2025-01-09 10:32:15",
    "updated_at": "2025-01-09 10:32:15"
});
        Subject::create({
    "id": 7,
    "name": "Fizyka",
    "description": "Nauka o zjawiskach fizycznych",
    "created_at": "2025-01-09 10:32:15",
    "updated_at": "2025-01-09 10:32:15"
});
        Subject::create({
    "id": 8,
    "name": "Geografia",
    "description": "Nauka o Ziemi i zjawiskach geograficznych",
    "created_at": "2025-01-09 10:32:15",
    "updated_at": "2025-01-09 10:32:15"
});
    }
}
