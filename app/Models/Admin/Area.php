<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name',
        'status',
    ];

    protected $casts = [
        'id'            => 'integer',
        'slug'          => 'string',
        'name'          => 'string',
        'status'        => 'integer',
        'created_at'    => 'date:Y-m-d',
        'updated_at'    => 'date:Y-m-d',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
