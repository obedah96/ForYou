<?php

namespace App\Http\Controllers\HomeApplianceControllers;

use App\Http\Controllers\Controller;
use App\Application\UseCases\HomeAppliances\GetHomeAppliancesUseCase;

class HomeApplianceController extends Controller
{
    protected $useCase;

    public function __construct(GetHomeAppliancesUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    
    public function getLatestThree()
    {
        $homeAppliances = $this->useCase->getLatestThree();
        return response()->json($homeAppliances);
    }

       public function getAll()
    {
        $homeAppliances = $this->useCase->getAll();
        return response()->json($homeAppliances);
    }
}
