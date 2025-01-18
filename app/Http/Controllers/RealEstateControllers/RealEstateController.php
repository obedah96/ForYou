<?php
//App\Http\Controllers\RealEstateControllers\RealEstateController.php
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

    public function index(Request $request)
    {
        
        $perPage = $request->get('per_page', 3);
        $realEstates = $this->getRealEstatesUseCase->execute($perPage);

        return response()->json($realEstates);
    }
}
