<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\RegisterController;
use App\Http\Controllers\UserControllers\LoginController;
use App\Http\Controllers\UserControllers\LogoutController;
use App\Http\Controllers\UserControllers\PersonalInformationController;
use App\Http\Controllers\UserControllers\EmailVerificationController;
route::get('/hello',function(){return "hello to api part";});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register',[RegisterController::class,'store']);
Route::get('verify-email/{token}',[EmailVerificationController::class,'verify']);
Route::post('LoginUser',[LoginController::class,'Login']);
Route::middleware('auth:sanctum')->post('/LogoutUser',[LogoutController::class,'logout']);
Route::middleware('auth:sanctum')->get('Personal_Information', [PersonalInformationController::class, 'show']);
