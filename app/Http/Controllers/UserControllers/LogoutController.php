<?php

namespace App\Http\Controllers\UserControllers;
use App\Http\Controllers\Controller;
use App\Application\UseCases\User\LogoutUser;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    private LogoutUser $logoutUser;

    public function __construct(LogoutUser $logoutUser )
    {
        $this->logoutUser  = $logoutUser ;
    }
    public function logout(Request $request)
{
    $user = $request->user(); 
    $this->logoutUser->logout($user); 

    return response()->json([
        'message' => 'Logged out successfully',
    ], 200);
}
}
