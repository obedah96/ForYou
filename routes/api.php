<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\RegisterController;
use App\Http\Controllers\UserControllers\LoginController;
use App\Http\Controllers\UserControllers\EmailVerificationController;
route::get('/hello',function(){return "hello to api part";});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register',[RegisterController::class,'store']);
Route::get('verify_email/{token}',[EmailVerificationController::class,'verify']);
Route::post('LoginUser',[LoginController::class,'Login']);
