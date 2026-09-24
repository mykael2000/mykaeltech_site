<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'icon', 'short_description', 'excerpt', 'description',
        'image_path', 'cover_photo', 'tech_stack', 'technologies',
        'external_url', 'github_url', 'demo_url', 'link', 'repo_url', 'image',
        'category', 'status', 'duration', 'challenges',
        'is_featured', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'technologies' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getExcerptAttribute($value): ?string
    {
        return $value ?? $this->attributes['short_description'] ?? null;
    }

    public function getShortDescriptionAttribute($value): ?string
    {
        return $value ?? $this->attributes['excerpt'] ?? null;
    }

    public function getTechnologiesAttribute($value): ?array
    {
        if ($value !== null) {
            return $this->castAttribute('technologies', $value);
        }

        $fallback = $this->attributes['tech_stack'] ?? null;

        if ($fallback === null) {
            return null;
        }

        if (is_string($fallback)) {
            $decoded = json_decode($fallback, true);

            return is_array($decoded) ? $decoded : [$fallback];
        }

        return is_array($fallback) ? $fallback : null;
    }

    public function getTechStackAttribute($value): ?array
    {
        if ($value !== null) {
            return $this->castAttribute('tech_stack', $value);
        }

        return $this->getTechnologiesAttribute($this->attributes['technologies'] ?? null);
    }

    public function getCoverPhotoAttribute($value): ?string
    {
        return $value ?? $this->attributes['image_path'] ?? $this->attributes['image'] ?? null;
    }

    public function getImagePathAttribute($value): ?string
    {
        return $value ?? $this->attributes['cover_photo'] ?? $this->attributes['image'] ?? null;
    }

    public function getGithubUrlAttribute($value): ?string
    {
        return $value ?: ($this->attributes['repo_url'] ?? null) ?: null;
    }

    public function getExternalUrlAttribute($value): ?string
    {
        return $value ?: ($this->attributes['link'] ?? null) ?: null;
    }

    public function getStatusLabelAttribute(): string
    {
        return $this->attributes['status'] ?? 'Live';
    }

    public function getDurationAttribute($value): ?string
    {
        return $value ?? null;
    }
}
