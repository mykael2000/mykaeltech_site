<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name', 'role', 'bio', 'image_path', 'photo_path', 'photo', 'email',
        'linkedin_url', 'github_url', 'twitter_url', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getPhotoPathAttribute($value): ?string
    {
        return $value ?? $this->attributes['image_path'] ?? $this->attributes['photo'] ?? null;
    }

    public function getImagePathAttribute($value): ?string
    {
        return $value ?? $this->attributes['photo_path'] ?? $this->attributes['photo'] ?? null;
    }
}
