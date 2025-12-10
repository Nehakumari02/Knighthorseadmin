<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'version',
        'splash_screen_image',
        'url_title',
        'android_url',
        'iso_url',
    ];

    protected $casts = [
        'version'             => 'string',
        'splash_screen_image' => 'string',
        'created_at'          => 'date:Y-m-d',
        'updated_at'          => 'date:Y-m-d',
    ];
}
