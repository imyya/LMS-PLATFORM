<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Progress extends Model
{
    //
       use HasUuids;

    const CREATED_AT = null;

    protected $table = 'progress';

    protected $fillable = [
        'user_id',
        'lesson_id',
        'completed',
        'watch_time_seconds',
        'last_position_seconds',
        'completed_at',
    ];

    protected $casts = [
        'completed' => 'boolean',
        'watch_time_seconds' => 'integer',
        'last_position_seconds' => 'integer',
        'completed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }
}
