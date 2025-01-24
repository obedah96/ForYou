<?php
// App\Http\Controllers\RealEstateControllers\RealEstateController.php
namespace App\Http\Controllers\RealEstateControllers;

use App\Http\Controllers\Controller;
use App\Application\UseCases\RealEstates\GetRealEstatesUseCase;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    protected $getRealEstatesUseCase;

    public function __construct(GetRealEstatesUseCase $getRealEstatesUseCase)
    {
        $this->getRealEstatesUseCase = $getRealEstatesUseCase;
    }

    
    public function getLatest()
    {
        $realEstates = $this->getRealEstatesUseCase->getLatest();
        return response()->json($realEstates);
    }

    
    public function getAll()
    {
        $realEstates = $this->getRealEstatesUseCase->getAll();
        return response()->json($realEstates);
    }
}
