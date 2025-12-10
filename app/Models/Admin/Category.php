<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'data',
        'uuid',
        'image',
        'status',
        'user_type', // 👈 new field
    ];

    protected $casts = [
        'data'               => 'object',
        'uuid'               => 'string',
        'image'              => 'string',
        'status'             => 'integer',
        'user_type'=> 'string', // 👈 added cast
    ];

    public function sub_category()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
}
