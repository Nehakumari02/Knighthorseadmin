<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetupKyc extends Model
{
    use HasFactory;

    protected $casts = [
        'id'           => "integer",
        'fields'       => "object",
        'slug'         => "string",
        'user_type'    => "string",
        'status'       => "integer"
    ];
    protected $fillable = [
        'slug',
        'user_type',
        'fields',
        'status',
        'last_edit_by',
    ];



    public function scopeActive($query)
    {
        $query->where("status", true);
    }
}
