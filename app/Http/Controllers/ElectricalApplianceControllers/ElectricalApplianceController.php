<?php
// App\Http\Controllers\ElectricalApplianceControllers\ElectricalApplianceController.php
namespace App\Http\Controllers\ElectricalApplianceControllers;
use App\Http\Controllers\Controller;
use App\Application\UseCases\ElectricalAppliances\GetPaginatedElectricalAppliances;
use Illuminate\Http\Request;

class ElectricalApplianceController extends Controller
{
    protected $getPaginatedElectricalAppliances;

    public function __construct(GetPaginatedElectricalAppliances $getPaginatedElectricalAppliances)
    {
        $this->getPaginatedElectricalAppliances = $getPaginatedElectricalAppliances;
    }

    public function index(Request $request)
    {
        $page=3;
        
        $products = $this->getPaginatedElectricalAppliances->execute($page);

        return response()->json($products);
    }
}
