<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'type', 'title', 'slug', 'excerpt', 'content',
        'cover_image', 'published_at', 'views', 'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            'learning_update' => 'Learning Update',
            'tech_fact' => 'Tech Fact',
            'tutorial' => 'Tutorial',
            'news' => 'News',
            default => 'Update',
        };
    }

    public function getReadTimeAttribute(): int
    {
        return max(1, (int) ceil(str_word_count(strip_tags((string) $this->content)) / 200));
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at');
    }

    public function scopeLearningUpdates($query)
    {
        return $query->published()->where('type', 'learning_update');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
