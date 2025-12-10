<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'internal_trx_type',
        'internal_trx_ref_id',
        'transaction_type',
        'sender_address',
        'receiver_address',
        'amount',
        'asset',
        'block_number',
        'txn_hash',
        'chain',
        'callback_response',
        'status',
    ];
}
