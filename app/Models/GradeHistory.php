<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GradeHistory extends Model
{
    protected $fillable = [
        'grade_id',
        'edited_by',
        'old_grade',
        'new_grade',
        'old_comment',
        'new_comment'
    ];

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'edited_by');
    }
} 