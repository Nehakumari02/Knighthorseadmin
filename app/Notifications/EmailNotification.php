<?php

namespace App\Notifications;

use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Models\Admin\Currency;
use App\Models\Admin\SiteSections;
use App\Constants\SiteSectionConst;
use App\Http\Helpers\PaymentGateway;
use App\Models\Admin\PaymentGatewayCurrency;
use App\Models\Admin\PaymentGateway as methodName;
use App\Models\Admin\ProductBooking;
use App\Providers\Admin\BasicSettingsProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification
{
    use Queueable;
    public $user;
    public $data;
    public $trx_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $data, $trx_id)
    {
        $this->user   = $user;
        $this->data   = $data;
        $this->trx_id = $trx_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user           = $this->user;
        $data           = $this->data;
        $user_data      = ProductBooking::where('uuid', $data->uuid ?? "")->first();
        $trx_id         = $this->trx_id;
        $basic_settings = BasicSettingsProvider::get();
        $currency       = Currency::where('default', true)->first();
        return (new MailMessage())
            ->subject("Your Product order No: ". $trx_id)
            ->view('frontend.email.confirmation', [
                'user_data'         => $user_data,
                'data'              => $data,
                'user'              => $user,
                'trx_id'            => $trx_id,
                'basic_settings'    => $basic_settings,
                'currency'          => $currency,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
