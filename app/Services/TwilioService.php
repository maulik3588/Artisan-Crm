<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;

    public function __construct()
    {
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $this->client = new Client($sid, $token);
    }

    public function sendSms(string $to, string $message): void
    {
        $this->client->messages->create($to, [
            'from' => config('services.twilio.from'),
            'body' => $message,
        ]);
    }
}