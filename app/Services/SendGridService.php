<?php

namespace App\Services;

use SendGrid;
use SendGrid\Mail\Mail;

class SendGridService
{
    protected $sendGrid;

    public function __construct()
    {
        $this->sendGrid = new SendGrid(config('services.sendgrid.api_key'));
    }

    public function sendEmail($to, $subject, $content)
    {
       
        $email = new Mail();
        $email->setFrom(config('mail.from.address'), config('mail.from.name'));
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent('text/html', $content);

        try {
            $response = $this->sendGrid->send($email);
            
            return $response->statusCode() >= 200 && $response->statusCode() < 300;
        } catch (\Exception $e) {
            \Log::error('SendGrid error: ' . $e->getMessage());
            return false;
        }
    }
}