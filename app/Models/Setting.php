<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'brand_name',
        'owner_name',
        'role_title',
        'profile_photo',
        'bio',
        'about',
        'email',
        'whatsapp',
        'location',
        'cv_file',
        'theme_color',
        'seo_title',
        'seo_description',
        'seo_og_image',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1]);
    }
}
