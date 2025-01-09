<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'id' => 1,
            'name' => 'Administrator',
            'slug' => 'admin',
            'created_at' => '2025-01-09 10:32:15',
            'updated_at' => '2025-01-09 10:32:15'
        ]);
        Role::create([
            'id' => 2,
            'name' => 'Nauczyciel',
            'slug' => 'teacher',
            'created_at' => '2025-01-09 10:32:15',
            'updated_at' => '2025-01-09 10:32:15'
        ]);
        Role::create([
            'id' => 3,
            'name' => 'Student',
            'slug' => 'student',
            'created_at' => '2025-01-09 10:32:15',
            'updated_at' => '2025-01-09 10:32:15'
        ]);
    }
}
