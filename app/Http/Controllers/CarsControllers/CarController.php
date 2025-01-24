<?php

namespace App\Http\Controllers\CarsControllers;
//app\Http\Controllers\CarsControllers\CarController.php
use App\Http\Controllers\Controller;
use App\Application\UseCases\Cars\GetLatestCarsUseCase;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $getLatestCarsUseCase;

    public function __construct(GetLatestCarsUseCase $getLatestCarsUseCase)
    {
        $this->getLatestCarsUseCase = $getLatestCarsUseCase;
    }

    public function getLatestThreeCars(Request $request)
    {
        $cars = $this->getLatestCarsUseCase->execute();
        
        return response()->json($cars);
    }
    public function getAllCars(Request $request)
    {
        $cars = $this->getLatestCarsUseCase->execute1();
        
        return response()->json($cars);
    }
}
