<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAuthDriver extends Model
{
    use HasFactory;

    public const PANEL_USER = "USER";

    protected $fillable = [
        'ulid',
        'panel',
        'driver_name',
        'driver_slug',
        'credentials',
        'image',
        'status',
        'redirect_url',
    ];

    protected $casts = [
        'credentials' => 'object',
    ];

    public function scopeUserPanel($query)
    {
        return $query->where('panel', self::PANEL_USER);
    }
}
