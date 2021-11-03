<?php

namespace App\Contracts\Services\Mail;

interface MailServiceInterface
{
    /**
     * To send email to employee
     * @param array $validated attributes email to be sent
     * @return void
     */
    public function sendMail($validated);
}