<?php

namespace App\Models;

use App\Constants\GlobalConst;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\PaymentGateway;
use App\Constants\PaymentGatewayConst;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\PaymentGatewayCurrency;

class Transaction extends Model
{
    use HasFactory;

    protected $casts = [
        'id'                          => 'integer',
        'user_id'                     => 'integer',
        'receiver_id'                 => 'integer',
        'wallet_id'                   => 'integer',
        'payment_gateway_currency_id' => 'integer',
        'type'                        => 'string',
        'request_currency'            => 'string',
        'trx_id'                      => 'string',
        'user_type'                   => 'string',
        'receiver_type'               => 'string',
        'remark'                      => 'string',
        'reject_reason'               => 'string',
        'callback_ref'                => 'string',
        'details'                     => 'object',
        'receive_amount'              => 'double',
        'exchange_rate'               => 'double',
        'percent_charge'              => 'double',
        'fixed_charge'                => 'double',
        'total_charge'                => 'double',
        'total_payable'               => 'double',
        'request_amount'              => 'double',
        'available_balance'           => 'double',
        'status'                      => 'integer',
        'refundable'                  => 'integer',
    ];

    protected $fillable = [
        'type',
        'trx_id',
        'user_type',
        'user_id',
        'payment_gateway_currency_id',
        'request_amount',
        'request_currency',
        'exchange_rate',
        'wallet_id',
        'percent_charge',
        'fixed_charge',
        'total_charge',
        'total_payable',
        'receive_amount',
        'receiver_type',
        'receiver_id',
        'available_balance',
        'payment_currency',
        'remark',
        'details',
        'status',
        'reject_reason',
        'callback_ref',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return "trx_id";
    }



    public function payment_gateway()
    {
        return $this->belongsTo(PaymentGateway::class);
    }

    public function getCreatorAttribute()
    {
        if ($this->user_type == GlobalConst::USER) {
            return $this->user;
        } elseif ($this->user_type == GlobalConst::ADMIN) {
            return $this->admin;
        }
    }

    public function receiver_info()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function getReceiverAttribute()
    {
        if ($this->receiver_type == GlobalConst::USER) {
            return $this->receiver_info;
        }
    }

    public function getCreatorWalletAttribute()
    {
        if ($this->user_type == GlobalConst::USER) {
            return $this->user_wallet;
        } elseif ($this->user_type == GlobalConst::ADMIN) { //  if user type ADMIN wallet_id is user wallet id. Because admin has no wallet.
            return $this->user_wallet;
        }
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

    public function scopeMoneyOut($query)
    {
        return $query->where('type', PaymentGatewayConst::TYPEWITHDRAW);
    }

    public function gateway_currency()
    {
        return $this->belongsTo(PaymentGatewayCurrency::class, 'payment_gateway_currency_id');
    }

    public function scopePending($query)
    {
        return $query->where('status', PaymentGatewayConst::STATUS_PENDING);
    }

    public function scopeComplete($query)
    {
        return $query->where('status', PaymentGatewayConst::STATUS_SUCCESS);
    }

    public function scopeReject($query)
    {
        return $query->where('status', PaymentGatewayConst::STATUS_REJECTED);
    }

    public function scopeAddMoney($query)
    {
        return $query->where('type', PaymentGatewayConst::PAYMENTMETHOD);
    }

    public function scopeChartData($query)
    {
        return $query->select([
            DB::raw("DATE(created_at) as date"),
            DB::raw('COUNT(*) as total')
        ])
            ->groupBy('date')
            ->pluck('total');
    }

    public function scopeThisMonth($query)
    {
        return $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
    }

    public function scopeThisYear($query)
    {
        return $query->whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()]);
    }

    public function scopeYearChartData($query)
    {
        return $query->select([
            DB::raw('sum(total_charge) as total, YEAR(created_at) as year, MONTH(created_at) as month'),
        ])->groupBy('year', 'month')->pluck('total', 'month');
    }

    public function scopeAuth($query)
    {
        return $query->where('user_type', GlobalConst::USER)->where('user_id', auth()->user()->id);
    }

    public function scopeMoneyTransfer($query)
    {
        return $query->where('type', PaymentGatewayConst::TYPETRANSFERMONEY);
    }

    public function scopeSearch($query, $data)
    {
        return $query->where("trx_id", "like", "%" . $data . "%");
    }
}
