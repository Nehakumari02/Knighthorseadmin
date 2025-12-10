<?php

namespace App\Http\Helpers\SmsProviders;

use Twilio\Rest\Client;
use App\Models\TemporaryData;
use App\Models\Admin\SmsProvider;

class Twilio
{
    /**
     * Provider slug
     */
    public const SLUG = "twilio";

    public SmsProvider $provider;

    private object $credentials;

    public function __construct(SmsProvider $provider)
    {
        $this->provider = $provider;
        $this->getCredentials($provider);
    }

    /**
     * send message using this provider
     * @param string $receiver
     * @param string $message
     * @param string $otp
     * @param \App\Models\TemporaryData|null $temp_data
     * @return bool|\App\Models\TemporaryData $temp_data
     */
    public function send(string $receiver, string $message, string $otp, TemporaryData|null $temp_data = null): bool|TemporaryData
    {
        $credentials = $this->credentials;
        $sid         = $credentials->account_sid       ?? "";
        $auth_token  = $credentials->auth_token        ?? "";
        $from_number = $credentials->from_phone_number ?? "";
        if (app()->environment() != "local") {
            // send message
            $client = new Client($sid, $auth_token);

            $message = $client->messages->create(
                $receiver,
                [
                    'from' => $from_number,
                    'body' => $message
                    ]
            );

            $message_sid = $message->sid;
        }

        if (app()->environment() == "local") {

            logger("Phone Verification OTP is: ", [
                'message'   => $message,
            ]);
        };

        if ($temp_data) {
            $data = json_decode(json_encode($temp_data->data), true);

            $data['otp'] = [
                'sended'        => true,
                'otp'           => $otp,
                'message_sid'   => $message_sid ?? null,
            ];


            $temp_data->update([

                'data'          => $data,
                'updated_at'    => now(),
            ]);

            $temp_data->refresh();

            return $temp_data;
        }


        return true;
    }

    /**
     * get credentials
     * @param \App\Models\Admin\SmsProvider $provider
     */
    public function getCredentials(SmsProvider $provider)
    {
        $provider_credentials = $provider->credentials;

        $credential_collect = collect($provider_credentials);

        $credentials = [
            'account_sid'               => $credential_collect->where('name', 'account_sid')->first()?->value,
            'auth_token'                => $credential_collect->where('name', 'auth_token')->first()?->value,
            'from_phone_number'         => $credential_collect->where('name', 'from_phone_number')->first()?->value,
            'env'                       => $provider->env,
        ];

        $this->credentials = (object) $credentials;

        return $this->credentials;
    }

}
