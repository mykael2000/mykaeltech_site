<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'community_member_id', 'company', 'position', 'description',
        'start_date', 'end_date', 'is_current', 'sort_order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
    ];

    public function member()
    {
        return $this->belongsTo(CommunityMember::class, 'community_member_id');
    }
}
