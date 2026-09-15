<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'location', 'registration_url',
        'cover_image', 'starts_at', 'ends_at', 'is_published',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('starts_at');
    }

    public function scopeUpcoming($query)
    {
        return $query->published()->where('starts_at', '>=', now());
    }
}
