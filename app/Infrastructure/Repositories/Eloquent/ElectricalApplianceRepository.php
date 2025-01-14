<?php
//app\Infrastructure\Repositories\Eloquent\ElectricalApplianceRepository.php
namespace App\Infrastructure\Repositories\Eloquent;

use App\Domain\Entities\ElectricalAppliance;
use App\Infrastructure\Repositories\Interfaces\ElectricalApplianceRepositoryInterface;

class ElectricalApplianceRepository implements ElectricalApplianceRepositoryInterface
{
    public function paginateElectricalAppliances(int $itemsPerPage)
    {
        return ElectricalAppliance::orderBy('created_at', 'desc')->paginate($itemsPerPage);
    }
}
