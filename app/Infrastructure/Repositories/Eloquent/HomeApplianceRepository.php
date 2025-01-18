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
            return HomeAppliance::select('home_appliances.product_id', 'home_appliances.product_name', 'home_appliances.price', 'home_appliances.image_path', 'home_appliances.product_city', 'products.product_type') // إضافة نوع المنتج من جدول products
                                ->join('products', 'home_appliances.product_id', '=', 'products.id') // الانضمام إلى جدول products عبر product_id
                                ->latest()
                                ->take(3)
                                ->get();
        }
        
        return HomeAppliance::select('home_appliances.product_name', 'home_appliances.price', 'home_appliances.image_path', 'home_appliances.product_city', 'products.product_type') // إضافة نوع المنتج من جدول products
                            ->join('products', 'home_appliances.product_id', '=', 'products.id') // الانضمام إلى جدول products
                            ->paginate($limit, ['*'], 'page', $page);
        
    }
}
