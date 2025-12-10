<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\PaymentGatewayConst;
use App\Models\User;

class ProductOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'booking_data',
        'payment_gateway_currency_id',
        'order_id',
        'trx_id',
        'booking_exp_seconds',
        'payment_method',
        'uuid',
        'total_charge',
        'price',
        'payable_price',
        'gateway_payable_price',
        'message',
        'type',
        'payment_currency',
        'remark',
        'details',
        'status',
        'reject_reason',
        'callback_ref',
    ];

    protected $casts = [
        'id'                            => 'integer',
        'user_id'                       => 'integer',
        'order_id '                     => 'integer',
        'booking_data'                  => 'object',
        'payment_gateway_currency_id'   => 'integer',
        'trx_id'                        => 'string',
        'booking_exp_seconds'           => 'integer',
        'date'                          => 'string',
        'payment_method'                => 'string',
        'type'                          => 'string',
        'reject_reason'                 => 'string',
        'payment_currency'              => 'string',
        'uuid'                          => 'string',
        'total_charge'                  => 'decimal:8',
        'price'                         => 'decimal:8',
        'payable_price'                 => 'decimal:8',
        'gateway_payable_price'         => 'decimal:8',
        'message'                       => 'string',
        'remark'                        => 'string',
        'status'                        => 'integer',
        'reject_reason'                 => 'string'
    ];

    public function payment_gateway()
    {
        return $this->belongsTo(PaymentGateway::class);
    }
    public function shipments()
    {
        return $this->belongsTo(OrderShipment::class, 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id');
    }

    public function getStringStatusAttribute()
    {
        $status = $this->status;
        $data   = [
            'class' => "",
            'value' => "",
        ];
        if ($status == PaymentGatewayConst::STATUS_SUCCESS) {
            $data = [
                'class'     => "badge badge--success",
                'value'     => "Success",
            ];
        } elseif ($status == PaymentGatewayConst::STATUS_PENDING) {
            $data = [
                'class'     => "badge badge--warning",
                'value'     => "Pending",
            ];
        } elseif ($status == PaymentGatewayConst::STATUS_HOLD) {
            $data = [
                'class'     => "badge badge--warning",
                'value'     => "Hold",
            ];
        } elseif ($status == PaymentGatewayConst::STATUS_REJECTED) {
            $data = [
                'class'     => "badge badge--danger",
                'value'     => "Rejected",
            ];
        } elseif ($status == PaymentGatewayConst::STATUS_WAITING) {
            $data = [
                'class'     => "badge badge--danger",
                'value'     => "Waiting",
            ];
        }

        return (object) $data;
    }
    public function gateway_currency()
    {
        return $this->belongsTo(PaymentGatewayCurrency::class, 'payment_gateway_currency_id');
    }
}
