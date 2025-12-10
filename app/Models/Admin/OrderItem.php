<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
   protected $fillable = [
    'order_id',
    'product_id',
    'price',
    'quantity',
];

    protected $casts = [
        'order_id'    => 'integer',
        'product_id'  => 'string',
        'quantity'    => 'integer',
        'price'       => 'decimal:16',
        'created_at'  => 'date:Y-m-d',
        'updated_at'  => 'date:Y-m-d',
    ];

        public function product(){
            return $this->belongsTo(Product::class);
        }
          public function order(){
            return $this->belongsTo(Order::class);
        }
    
}
