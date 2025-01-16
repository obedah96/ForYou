<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\RegisterController;
use App\Http\Controllers\UserControllers\LoginController;
use App\Http\Controllers\UserControllers\LogoutController;
use App\Http\Controllers\UserControllers\PersonalInformationController;
use App\Http\Controllers\UserControllers\EmailVerificationController;
use App\Http\Controllers\ProductControllers\ProductController;
use App\Http\Controllers\CarsControllers\CarController;
use App\Http\Controllers\ElectricalApplianceControllers\ElectricalApplianceController;
use App\Http\Controllers\HomeApplianceControllers\HomeApplianceController;
use App\Http\Controllers\RealEstateControllers\RealEstateController;
route::get('/hello',function(){return "hello to api part";});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register',[RegisterController::class,'store']);
Route::get('verify-email/{token}',[EmailVerificationController::class,'verify']);
Route::post('LoginUser',[LoginController::class,'Login']);
Route::middleware('auth:sanctum')->post('/LogoutUser',[LogoutController::class,'logout']);
Route::middleware('auth:sanctum')->get('Personal_Information', [PersonalInformationController::class, 'show']);
Route::middleware('auth:sanctum')->post('/products', [ProductController::class, 'store']);
Route::middleware('auth:sanctum')->get('/cars', [CarController::class, 'index']);
Route::middleware('auth:sanctum')->get('/electrical-appliances', [ElectricalApplianceController::class, 'index']);
Route::middleware('auth:sanctum')->get('/home-appliances', [HomeApplianceController::class, 'index']);
Route::middleware('auth:sanctum')->get('/real-estates', [RealEstateController::class, 'index']);