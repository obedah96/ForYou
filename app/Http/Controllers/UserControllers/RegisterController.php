<?php
//E:\ServiceHub\app\Http\Controllers\UserControllers\RegisterController.php
namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Application\UseCases\User\CreateUser;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    private CreateUser $createUser;

    public function __construct(CreateUser $createUser)
    {
        $this->createUser = $createUser;
    }

    public function store(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $user = $this->createUser->execute($validatedData);

            return response()->json([
                'message' => 'User registered successfully. Please check your email for verification.',
                'user' => $user,
            ],201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
