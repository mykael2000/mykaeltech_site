<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvDownload extends Model
{
    protected $fillable = ['user_id', 'file_path', 'generated_at'];

    protected $casts = [
        'generated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
