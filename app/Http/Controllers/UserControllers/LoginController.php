<?php

namespace App\Http\Controllers\UserControllers;

use App\Application\UseCases\User\LoginUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    private LoginUser $loginUser;

    public function __construct(LoginUser $loginUser)
    {
        $this->loginUser = $loginUser;
    }

    public function login(LoginRequest $request)
{
    $validatedData = $request->validated();

    try {
        // محاولة تسجيل الدخول
        $user = $this->loginUser->execute($validatedData);

        // إنشاء التوكين
        $token = $user->createToken('ForYou')->plainTextToken;
        return response()->json([
            'message' => 'Login successful',
            'data' => $user,
            'token' => $token,
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => $e->getMessage(),
        ], 403);
    }
}

    



}
