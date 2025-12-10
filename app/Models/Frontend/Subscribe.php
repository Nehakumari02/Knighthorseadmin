<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
    ];

    protected $casts = [
        'id'          => 'integer',
        'name'        => 'string',
        'email'       => 'string',
        'message'     => 'string',
        'reply'       => 'integer',
        'created_at'  => 'date:Y-m-d',
        'updated_at'  => 'date:Y-m-d',
    ];
}
