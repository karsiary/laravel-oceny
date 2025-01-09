<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    protected $fillable = ['name', 'description'];

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'teacher_subject', 'subject_id', 'user_id')
                    ->where('role_id', 2); // zakładając że ID 2 to rola nauczyciela
    }
} 