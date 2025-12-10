<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'data',
        'uuid',
        'slug',
        'image',
        'status',
    ];
    protected $casts   = [
        'id'                 => 'integer',
        'category_id'        => 'integer',
        'data'               => 'object',
        'uuid'               => 'string',
        'image'              => 'string',
        'status'             => 'integer',
        'created_at'         => 'date:Y-m-d',
        'updated_at'         => 'date:Y-m-d',
    ];

    public function categories()
    {
        // return $this->belongsTo(Category::class, 'category_id');
            return $this->belongsTo(Category::class, 'category_id');

    }
}
