<?php
namespace App\Http\Controllers\AdminControllers;
use App\Application\UseCases\Admin\LoginAdminUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class AdminLoginController extends controller{

    public function __construct(protected LoginAdminUseCase $LoginUseCase){}

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $result=$this->LoginUseCase->execute($request->email,$request->password);
        if(!$result)
            return response()->json(["message"=>"Invalid credentials"],401);
        return response()->json(["message"=>$result],200);
    }
}