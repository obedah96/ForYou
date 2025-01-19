<?php
//App\Infrastructure\Repositories\Eloquent\HomeApplianceRepository.php
namespace App\Infrastructure\Repositories\Eloquent;

use App\Domain\Entities\HomeAppliance;
use App\Infrastructure\Repositories\Interfaces\HomeApplianceRepositoryInterface;

class HomeApplianceRepository implements HomeApplianceRepositoryInterface
{
    public function paginate(int $limit, int $page)
    {
        if ($page == 1) {
            return HomeAppliance::select('home_appliances.product_id', 'home_appliances.product_name', 'home_appliances.price', 'home_appliances.image_path', 'home_appliances.product_city', 'products.product_type') 
                                ->join('products', 'home_appliances.product_id', '=', 'products.id') 
                                ->orderBy('home_appliances.created_at', 'desc')
                                ->take(3)
                                ->get();
        }
        
        return HomeAppliance::select('home_appliances.product_name', 'home_appliances.price', 'home_appliances.image_path', 'home_appliances.product_city', 'products.product_type') 
                            ->join('products', 'home_appliances.product_id', '=', 'products.id') 
                            ->paginate($limit, ['*'], 'page', $page);
        
    }
}
