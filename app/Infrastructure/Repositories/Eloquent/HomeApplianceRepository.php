<?php
//App\Infrastructure\Repositories\Eloquent\HomeApplianceRepository.php
namespace App\Infrastructure\Repositories\Eloquent;

use App\Domain\Entities\HomeAppliance;
use App\Infrastructure\Repositories\Interfaces\HomeApplianceRepositoryInterface;

class HomeApplianceRepository implements HomeApplianceRepositoryInterface
{
    public function paginate(int $perPage)
{
    
    $allItems = HomeAppliance::select(
        'home_appliances.product_id', 
        'home_appliances.product_name', 
        'home_appliances.price', 
        'home_appliances.image_path', 
        'home_appliances.product_city', 
        'products.product_type'
    )
    ->join('products', 'home_appliances.product_id', '=', 'products.id')
    ->orderBy('home_appliances.created_at', 'desc')
    ->get();

    
    $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();

   
    if ($currentPage == 1) {
        
        $items = $allItems->take(3);
    } else {
        
        $items = $allItems->skip(3)->forPage($currentPage - 1, $perPage);
    }

    
    return new \Illuminate\Pagination\LengthAwarePaginator(
        $items,
        $allItems->count(),
        $perPage,
        $currentPage,
        ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
    );
}

}
