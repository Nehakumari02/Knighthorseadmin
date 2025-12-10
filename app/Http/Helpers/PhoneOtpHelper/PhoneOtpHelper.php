<?php

namespace App\Http\Helpers;

use Exception;
use App\Models\Admin\SmsProvider;
use App\Http\Helpers\SmsProviders\Twilio;

class PhoneOtpHelper
{
    /**
     * Register provider class
     */
    public array $provider_classes = [
        Twilio::SLUG      => Twilio::class,
    ];

    /**
     * store sms active provider
     */
    public SmsProvider $provider;

    public function __construct()
    {
        // store provider
        $this->setProvider();
    }

    /**
     * set active provider
     * @param \App\Models\Admin\SmsProvider $provider
     * @return self
     */
    public function setProvider(?SmsProvider $provider = null): self
    {
        if (!$provider) {
            $this->provider = SmsProvider::active()->first();
        }
        if (!$this->provider) {
            throw new Exception("Providers not found!");
        }

        return $this;
    }

    /**
     * get provide instance
     * @param \App\Models\Admin\SmsProvider|null $provider
     * @return mixed
     */
    public function getInstance(?SmsProvider $provider = null)
    {
        $provider = ($this->provider) ? $this->provider : $provider;
        if (!$provider) {
            throw new Exception("Provider Not Found!");
        }

        if (!array_key_exists($provider->slug, $this->provider_classes)) {
            throw new Exception("Does Not Register Provider Class, You Should Bind Provider Slug With Provider Class");
        }

        $provider_class = $this->provider_classes[$provider->slug];

        return new $provider_class($provider);
    }

}
