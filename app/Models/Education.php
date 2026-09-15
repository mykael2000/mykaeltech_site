<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'community_member_id', 'institution', 'degree', 'field',
        'start_year', 'end_year', 'description', 'sort_order',
    ];

    public function member()
    {
        return $this->belongsTo(CommunityMember::class, 'community_member_id');
    }
}
