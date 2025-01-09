<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id' => 1,
            'role_id' => 1,
            'name' => 'Admin',
            'surname' => 'System',
            'email' => 'admin@example.com',
            'email_verified_at' => null,
            'password' => '$2y$12$/rmLIyJfFu7DvnlI7KATHuF50BCZ8JUlf30JSAjaOPJTlwyijiS6u',
            'remember_token' => null,
            'created_at' => '2025-01-09 10:32:15',
            'updated_at' => '2025-01-09 10:32:15'
        ]);

        User::create([
            'id' => 2,
            'role_id' => 1,
            'name' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@admin',
            'email_verified_at' => null,
            'password' => '$2y$12$FRqNjI3h1oqh3ghNnQIlo.DPf56OT09nSCqWCkHEQCwk9aOkpfH/K',
            'remember_token' => null,
            'created_at' => '2025-01-09 10:33:44',
            'updated_at' => '2025-01-09 10:33:44'
        ]);

        User::create([
            'id' => 3,
            'role_id' => 2,
            'name' => 'Kamil',
            'surname' => 'Pysz',
            'email' => 'kamil@pysz',
            'email_verified_at' => null,
            'password' => '$2y$12$WYLC0a/t82PXtSIyddsv4uuncLJ7vQhLXbVOM1bICrf01KcmIsYo2',
            'remember_token' => null,
            'created_at' => '2025-01-09 10:37:23',
            'updated_at' => '2025-01-09 10:37:23'
        ]);

        User::create([
            'id' => 4,
            'role_id' => 3,
            'name' => 'Szymon',
            'surname' => 'Kaliczak',
            'email' => 'szymon@kaliczak',
            'email_verified_at' => null,
            'password' => '$2y$12$EzxKYGRs3H2qCYuKsr62nee/NE77Dod8nBrMEQonI761Dv9TNe2Jy',
            'remember_token' => null,
            'created_at' => '2025-01-09 11:06:30',
            'updated_at' => '2025-01-09 11:07:27'
        ]);

        User::create([
            'id' => 5,
            'role_id' => 2,
            'name' => 'Agata',
            'surname' => 'Palusińska',
            'email' => 'agata@palusinska',
            'email_verified_at' => null,
            'password' => '$2y$12$xYtCpCR3ivNsvTD3plUS3u.Gfdt3mB/d0iMYaeUqGS1ktF0O3ufC6',
            'remember_token' => null,
            'created_at' => '2025-01-09 11:11:37',
            'updated_at' => '2025-01-09 11:11:42'
        ]);

        User::create([
            'id' => 6,
            'role_id' => 2,
            'name' => 'Joanna',
            'surname' => 'Kapica',
            'email' => 'joanna@kapica',
            'email_verified_at' => null,
            'password' => '$2y$12$l0r9Bu.Vdy4t5M94aRo1Q.GFvA5dO5do26FMbAfk7jJ1zjf0njnQe',
            'remember_token' => null,
            'created_at' => '2025-01-09 11:12:04',
            'updated_at' => '2025-01-09 11:12:04'
        ]);

        User::create([
            'id' => 7,
            'role_id' => 3,
            'name' => 'Sebastian',
            'surname' => 'Woźniak',
            'email' => 'sebastian@wozniak',
            'email_verified_at' => null,
            'password' => '$2y$12$wfIX873jdrtcYzCqDS8sKO8qdwh4.I59DHu5lv0VqfUaqt0Yt/O76',
            'remember_token' => null,
            'created_at' => '2025-01-09 11:12:39',
            'updated_at' => '2025-01-09 11:12:48'
        ]);

        User::create([
            'id' => 8,
            'role_id' => 3,
            'name' => 'Krzysztof',
            'surname' => 'Brelik',
            'email' => 'krzysztof@brelik',
            'email_verified_at' => null,
            'password' => '$2y$12$njVVyxUKicNiFanRUYIqPO5wdfDtWabVs/Ce8W2nYKSbpNTMHx4L2',
            'remember_token' => null,
            'created_at' => '2025-01-09 11:13:06',
            'updated_at' => '2025-01-09 11:13:06'
        ]);
    }
}
