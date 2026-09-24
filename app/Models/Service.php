<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title', 'slug', 'icon', 'category', 'short_description', 'excerpt',
        'description', 'features', 'starting_price',
        'is_featured', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
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
}
