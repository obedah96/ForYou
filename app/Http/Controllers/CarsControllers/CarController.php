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

    public function index(Request $request)
    {
        $perPage = 3; 
        $cars = $this->getLatestCarsUseCase->execute($perPage);
        
        return response()->json($cars);
    }
}
