<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{ 
    use HasUuids;
    //
        protected $fillable = [
        'module_id',
        'title',
        'type',
        'content',
        'video_url',
        'file_url',
        'duration_seconds',
        'position',
    ];

    protected $casts = [
        'duration_seconds' => 'integer',
        'position' => 'integer',
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
