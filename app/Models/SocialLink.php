<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'platform',
        'url',
        'icon',
        'order',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
