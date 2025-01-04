<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Application\UseCases\User\GetUserInformation;
use Illuminate\Http\Request;

class PersonalInformationController extends Controller
{
    private GetUserInformation $getUserInformation;

    public function __construct(GetUserInformation $getUserInformation)
    {
        $this->getUserInformation = $getUserInformation;
    }

    public function show(Request $request)
    {
        $user = $request->user(); 
        $userInfo = $this->getUserInformation->execute($user);
        return response()->json([
            'message' => 'User information retrieved successfully',
            'data' => $userInfo,
        ], 200);
    }

}
