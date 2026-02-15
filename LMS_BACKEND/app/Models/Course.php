<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    //
     use HasUuids;

    protected $fillable = [
        'tenant_id',
        'instructor_id',
        'title',
        'slug',
        'short_description',
        'description',
        'thumbnail_url',
        'category',
        'price',
        'status',
        'published_at',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'published_at' => 'datetime',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

        public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }

    public function calculateProgress(string $userId): float
    {
        // Implements progress calculation
        return 0.0;
    }

}
