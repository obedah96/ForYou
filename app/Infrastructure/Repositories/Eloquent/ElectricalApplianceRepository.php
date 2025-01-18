<?php
//app\Infrastructure\Repositories\Eloquent\ElectricalApplianceRepository.php
namespace App\Infrastructure\Repositories\Eloquent;

use App\Domain\Entities\ElectricalAppliance;
use App\Infrastructure\Repositories\Interfaces\ElectricalApplianceRepositoryInterface;

class ElectricalApplianceRepository implements ElectricalApplianceRepositoryInterface
{
    public function paginateElectricalAppliances(int $itemsPerPage)
    {
        return ElectricalAppliance::select(
            'electrical_appliances.product_id',
            'electrical_appliances.product_name',
            'electrical_appliances.price',
            'electrical_appliances.image_path',
            'electrical_appliances.product_city',
            'products.product_type' 
        )
        ->join('products', 'electrical_appliances.product_id', '=', 'products.id') 
        ->orderBy('electrical_appliances.created_at', 'desc') 
        ->paginate($itemsPerPage);
    
    
    }
}
