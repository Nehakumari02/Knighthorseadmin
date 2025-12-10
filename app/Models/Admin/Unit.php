<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'unit',
        'slug',
        'status',
    ];

    protected $casts = [
        'id'           => 'integer',
        'name'         => 'string',
        'unit'         => 'string',
        'slug'         => 'string',
        'status'       => 'integer',
        'created_at'   => 'date:Y-m-d',
        'updated_at'   => 'date:Y-m-d',
    ];
}
