<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionSetting extends Model
{
    use HasFactory;


    protected $fillable = [
        'admin_id',
        'slug',
        'title',
        'fixed_charge',
        'percent_charge',
        'min_limit',
        'max_limit',
        'monthly_limit',
        'daily_limit',
        'status',
    ];


    protected $casts = [
        'admin_id'       => 'integer',
        'slug'           => 'string',
        'title'          => 'string',
        'fixed_charge'   => 'decimal:16',
        'percent_charge' => 'decimal:16',
        'status'         => 'integer',
        'feature_text'   => 'string',
        'created_at'     => 'date:Y-m-d',
        'updated_at'     => 'date:Y-m-d',
    ];


    protected $with = ['admin'];


    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
