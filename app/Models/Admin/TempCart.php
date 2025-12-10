<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // 👈 Import User Model

class TempCart extends Model
{
    use HasFactory;
    protected $fillable = [
        'data',
        'user_id',
        'session_id',
        'status',
        'uuid',
        'sub_total',
        'checkout',
    ];
    protected $casts   = [
        'data'        => 'object',
        'user_id'     => 'integer',
        'session_id'  => 'string',
        'uuid'        => 'string',
        'sub_total'   => 'decimal:2',
        'checkout'    => 'integer',
        'status'      => 'integer',
        'created_at'  => 'date:Y-m-d',
        'updated_at'  => 'date:Y-m-d',
    ];
    // 👇 ADD THIS FUNCTION
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
