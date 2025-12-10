<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterableByArea;

class Product extends Model
{
    use HasFactory;
    use FilterableByArea;
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'unit_id',
        'shipment_id',
        'data',
        'price',
        'offer_price',
        'uuid',
        'quantity',
        'order_quantity',
        'available_quantity',
        'image',
        'images',
        'status',
        'popular',
        'meta_image',
    ];
    protected $casts   = [
        'id'                 => 'integer',
        'sub_category_id'    => 'integer',
        'area_id'            => 'integer',
        'data'               => 'object',
        'meta_image'         => 'string',
        'uuid'               => 'string',
        'unit'               => 'string',
        'image'              => 'string',
        'images'             => 'array', // <--- Added: This converts JSON to Array automatically

        'price'              => 'double:8',
        'offer_price'        => 'double:8',
        'quantity'           => 'integer',
        'status'             => 'integer',
        'popular'            => 'integer',
        'created_at'         => 'date:Y-m-d',
        'updated_at'         => 'date:Y-m-d',
    ];

    // public function sub_category()
    // {
    //     return $this->belongsTo(SubCategory::class);
    // }
    public function sub_category() {
    // A Product "Belongs To" a SubCategory
    return $this->belongsTo(SubCategory::class, 'sub_category_id');
}
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
