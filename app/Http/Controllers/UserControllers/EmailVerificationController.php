<?php

namespace App\Http\Controllers\UserControllers;

use App\Application\UseCases\User\VerifyEmail;
use App\Http\Controllers\Controller;

class EmailVerificationController extends Controller
{
    private VerifyEmail $verifyEmail;

    public function __construct(VerifyEmail $verifyEmail)
    {
        $this->verifyEmail = $verifyEmail;
    }

    public function verify($token)
    {
        try {
            $message = $this->verifyEmail->execute($token);
            return redirect('http://localhost:3000/welcome');
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
