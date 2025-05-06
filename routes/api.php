<?php

use App\Http\Controllers\AdminControllers\AdminLoginController;
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
use App\Http\Controllers\AdminControllers\AdminLoginController;
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

Route::middleware('auth:sanctum')->get('/cars/all', [CarController::class, 'getAllCars']);
Route::middleware('auth:sanctum')->get('/cars/latest', [CarController::class, 'getLatestThreeCars']);

Route::middleware('auth:sanctum')->get('/ElectricalAppliances/all', [ElectricalApplianceController::class, 'getAllAppliances']);
Route::middleware('auth:sanctum')->get('/ElectricalAppliances/latest', [ElectricalApplianceController::class, 'getLatestThree']);

Route::middleware('auth:sanctum')->get('/home-appliances/all', [HomeApplianceController::class, 'getAll']);
Route::middleware('auth:sanctum')->get('/home-appliances/latest', [HomeApplianceController::class, 'getLatestThree']);

Route::middleware('auth:sanctum')->get('/real-estates/all', [RealEstateController::class, 'getAll']);
Route::middleware('auth:sanctum')->get('/real-estates/latest', [RealEstateController::class, 'getLatest']);

Route::middleware('auth:sanctum')->post('/product_details',[ProductController::class,'findProduct']);
Route::middleware('auth:sanctum')->get('/products/{type}', [ProductController::class, 'getProductsByType']);


//dashboard routes
Route::post('/dashboard/login',[AdminLoginController::class,'login']);
