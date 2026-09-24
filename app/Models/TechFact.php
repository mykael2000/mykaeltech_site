<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechFact extends Model
{
    protected $fillable = [
        'fact', 'source_url', 'author', 'category', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at');
    }
}
