<?php

namespace App\Models;

use App\Constants\SupportTicketConst;
use App\Models\Admin\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSupportTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'token',
        'name',
        'email',
        'desc',
        'subject',
        'status',
    ];

    protected $with = [
        'user',
        'attachments'
    ];

    protected $appends = ['type', 'stringStatus'];

    public function scopeAuthTickets($query)
    {
        $query->where("user_id", auth()->user()->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function creator()
    {
        if ($this->user_id != null) {
            return $this->user();
        }
    }

    public function attachments()
    {
        return $this->hasMany(UserSupportTicketAttachment::class);
    }

    public function getTypeAttribute()
    {
        return "USER";
    }

    public function conversations()
    {
        return $this->hasMany(UserSupportChat::class, "user_support_ticket_id");
    }

    public function scopePending($query)
    {
        return $query->where("status", SupportTicketConst::PENDING)->orWhere("status", SupportTicketConst::DEFAULT);
    }

    public function scopeActive($query)
    {
        return $query->where("status", SupportTicketConst::ACTIVE);
    }

    public function scopeSolved($query)
    {
        return $query->where("status", SupportTicketConst::SOLVED);
    }

    public function scopeNotSolved($query, $token)
    {
        $query->where('token', $token)->where('status', '!=', SupportTicketConst::SOLVED);
    }

    public function getStringStatusAttribute()
    {
        $status = $this->status;
        $data   = [
            'class' => "",
            'value' => "",
        ];
        if ($status == SupportTicketConst::ACTIVE) {
            $data = [
                'class'     => "badge badge--info",
                'value'     => "Active",
            ];
        } elseif ($status == SupportTicketConst::DEFAULT) {
            $data = [
                'class'     => "badge badge--warning",
                'value'     => "Default",
            ];
        } elseif ($status == SupportTicketConst::PENDING) {
            $data = [
                'class'     => "badge badge--warning",
                'value'     => "Pending",
            ];
        } elseif ($status == SupportTicketConst::SOLVED) {
            $data = [
                'class'     => "badge badge--success",
                'value'     => "Solved",
            ];
        }

        return (object) $data;
    }
}
