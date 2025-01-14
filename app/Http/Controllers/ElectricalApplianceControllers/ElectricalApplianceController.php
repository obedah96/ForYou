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
        $page = $request->input('page', 1);
        $itemsPerPage = ($page == 1) ? 3 : 10; // 3 items for first page, 10 for others

        $products = $this->getPaginatedElectricalAppliances->execute($itemsPerPage);

        return response()->json($products);
    }
}
