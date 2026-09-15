<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'community_member_id', 'name', 'issuer', 'issue_date', 'credential_url', 'sort_order',
    ];

    protected $casts = [
        'issue_date' => 'date',
    ];

    public function member()
    {
        return $this->belongsTo(CommunityMember::class, 'community_member_id');
    }
}
