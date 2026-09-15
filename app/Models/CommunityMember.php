<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityMember extends Model
{
    protected $fillable = [
        'user_id', 'username', 'headline', 'bio', 'company', 'location', 'phone',
        'skills', 'linkedin_url', 'github_url', 'twitter_url', 'website_url',
        'is_public', 'cv_last_generated_at',
    ];

    protected $casts = [
        'skills' => 'array',
        'is_public' => 'boolean',
        'cv_last_generated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class)->orderByDesc('start_date');
    }

    public function educations()
    {
        return $this->hasMany(Education::class)->orderByDesc('start_year');
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class)->orderByDesc('issue_date');
    }

    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }
}
