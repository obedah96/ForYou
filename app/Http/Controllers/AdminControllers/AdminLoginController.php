<?php
// app/Http/Controllers/AdminControllers/AdminLoginController.php
namespace App\Http\Controllers\AdminControllers;

use App\Application\UseCases\Admin\LoginAdminUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function __construct(protected LoginAdminUseCase $loginUseCase) {}

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $token = $this->loginUseCase->execute($data['email'], $data['password']);

        if (! $token) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        return response()->json([
            'message' => 'Logged in successfully',
            'token'   => $token,
        ], 200);
    }
}
