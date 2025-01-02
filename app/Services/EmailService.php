<?php

namespace App\Services;

use App\Infrastructure\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendVerificationEmail($user, $verificationUrl)
    {
        Mail::to($user->email)->send(new VerifyEmail($verificationUrl));
    }
}
