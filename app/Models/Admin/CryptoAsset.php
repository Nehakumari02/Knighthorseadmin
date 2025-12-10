<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_gateway_id',
        'type',
        'chain',
        'coin',
        'credentials',
        'assets',
    ];

    protected $casts = [
        'credentials' => 'object',
    ];


    public function gateway()
    {
        return $this->belongsTo(PaymentGateway::class, 'payment_gateway_id');
    }
}
