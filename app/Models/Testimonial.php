<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'author_name', 'author_role', 'name', 'role', 'company',
        'content', 'quote', 'rating', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderByDesc('rating');
    }

    public function getAuthorNameAttribute($value): ?string
    {
        return $value ?? $this->attributes['name'] ?? null;
    }

    public function getAuthorRoleAttribute($value): ?string
    {
        return $value ?? $this->attributes['role'] ?? null;
    }

    public function getContentAttribute($value): ?string
    {
        return $value ?? $this->attributes['quote'] ?? null;
    }
}
