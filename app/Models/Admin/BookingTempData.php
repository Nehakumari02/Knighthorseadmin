<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BookingTempData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'uuid',
        'data',
    ];
    protected $casts   = [
        'user_id'                            => 'integer',
        'data'                               => 'object',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payment_gateway()
    {
        return $this->belongsTo(PaymentGatewayCurrency::class, 'payment_gateway_currency_id');
    }
}
