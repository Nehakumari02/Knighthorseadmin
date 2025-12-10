<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'country',
        'city',
        'state',
        'zip_code',
        'user_id',
        'information',
        'reject_reason',
        'status',
    ];
}
