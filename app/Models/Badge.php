<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'badge_type',
        'order_index',
    ];

    protected $casts = [
        'order_index' => 'integer',
    ];
}