<?php
//App\Http\Controllers\HomeApplianceControllers\HomeApplianceController.php
namespace App\Http\Controllers\HomeApplianceControllers;
use App\Http\Controllers\Controller;
use App\Application\UseCases\HomeAppliances\GetHomeAppliancesUseCase;
use Illuminate\Http\Request;

class HomeApplianceController extends Controller
{
    protected $useCase;

    public function __construct(GetHomeAppliancesUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function index(Request $request)
    {
       
        $page = $request->query('page', 1);

        $homeAppliances = $this->useCase->execute( $page);

        return response()->json($homeAppliances);
    }
}
