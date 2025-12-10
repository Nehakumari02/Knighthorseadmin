<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_status',
        'payment_status',
        'total_amount',
    ];

    protected $casts = [
        'user_id'        => 'integer',
        'order_status'   => 'integer',
        'payment_status' => 'integer',
        'total_amount'   => 'decimal:8',
        'created_at'     => 'date:Y-m-d',
        'updated_at'     => 'date:Y-m-d',
    ];



    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
