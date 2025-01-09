<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GradeHistory;

class GradeHistorySeeder extends Seeder
{
    public function run(): void
    {
        GradeHistory::create({
    "id": 1,
    "grade_id": 1,
    "edited_by": 3,
    "old_grade": null,
    "new_grade": 5,
    "old_comment": null,
    "new_comment": null,
    "created_at": "2025-01-09 11:13:34",
    "updated_at": "2025-01-09 11:13:34"
});
        GradeHistory::create({
    "id": 2,
    "grade_id": 2,
    "edited_by": 3,
    "old_grade": null,
    "new_grade": 5,
    "old_comment": null,
    "new_comment": null,
    "created_at": "2025-01-09 11:13:57",
    "updated_at": "2025-01-09 11:13:57"
});
        GradeHistory::create({
    "id": 3,
    "grade_id": 3,
    "edited_by": 3,
    "old_grade": null,
    "new_grade": 5,
    "old_comment": null,
    "new_comment": null,
    "created_at": "2025-01-09 11:14:00",
    "updated_at": "2025-01-09 11:14:00"
});
        GradeHistory::create({
    "id": 4,
    "grade_id": 4,
    "edited_by": 3,
    "old_grade": null,
    "new_grade": 1,
    "old_comment": null,
    "new_comment": null,
    "created_at": "2025-01-09 11:14:04",
    "updated_at": "2025-01-09 11:14:04"
});
        GradeHistory::create({
    "id": 5,
    "grade_id": 4,
    "edited_by": 3,
    "old_grade": 1,
    "new_grade": 4,
    "old_comment": null,
    "new_comment": null,
    "created_at": "2025-01-09 11:15:24",
    "updated_at": "2025-01-09 11:15:24"
});
        GradeHistory::create({
    "id": 6,
    "grade_id": 4,
    "edited_by": 3,
    "old_grade": 4,
    "new_grade": 6,
    "old_comment": null,
    "new_comment": "Bo jeste\u015b dobry",
    "created_at": "2025-01-09 11:15:39",
    "updated_at": "2025-01-09 11:15:39"
});
        GradeHistory::create({
    "id": 7,
    "grade_id": 1,
    "edited_by": 3,
    "old_grade": 5,
    "new_grade": 1,
    "old_comment": null,
    "new_comment": "a",
    "created_at": "2025-01-09 11:16:00",
    "updated_at": "2025-01-09 11:16:00"
});
    }
}
