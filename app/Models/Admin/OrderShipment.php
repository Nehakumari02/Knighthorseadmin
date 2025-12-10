<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderShipment extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_order_id',
        'shipment_id',
        'user_id',
        'tracking_number',
        'start_time',
        'end_time',
        'delivery_date',
        'delivery_charge',
        'shipment_status',
    ];
    protected $casts   = [
        'product_order_id'  => 'integer',
        'shipment_id'       => 'integer',
        'user_id'           => 'integer',
        'tracking_number'   => 'string',
        'start_time'        => 'string',
        'end_time'          => 'string',
        'delivery_date'     => 'string',
        'shipment_status'   => 'integer',
    ];


    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function product_order()
    {
        return $this->belongsTo(ProductOrder::class);
    }
}
