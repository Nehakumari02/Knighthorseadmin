<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'delivery_delay_days',
        'delivery_charge',
        'star_time',
        'end_time',
        'time_range',
        'default',
    ];

    protected $casts = [
        'name'                => 'string',
        'delivery_delay_days' => 'string',
        'delivery_charge'     => 'string',
        'star_time'           => 'string',
        'end_time'            => 'string',
        'time_range'          => 'string',
        'default'             => 'integer',
        'created_at'          => 'date:Y-m-d',
        'updated_at'          => 'date:Y-m-d',
    ];
}
