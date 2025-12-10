<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverySettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'bag_price',
        'amount_spend',
        'delivery_count',
        'bag_status',
        'free_delivery_status',
    ];

    protected $casts = [

        'bag_price'       => 'integer',
        'amount_spend'    => 'integer',
        'delivery_count'  => 'integer',
        'bag_status'    => 'integer',
        'free_delivery_status'  => 'integer',
    ];
}
