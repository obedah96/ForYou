<?php

namespace App\Infrastructure\Repositories\Eloquent;

use App\Domain\Entities\HomeAppliance;
use App\Infrastructure\Repositories\Interfaces\HomeApplianceRepositoryInterface;

class HomeApplianceRepository implements HomeApplianceRepositoryInterface
{
    // دالة لجلب آخر ثلاث منتجات فقط
    public function getLatestThree(): \Illuminate\Support\Collection
    {
        return HomeAppliance::select(
            'home_appliances.product_id',
            'home_appliances.product_name',
            'home_appliances.price',
            'home_appliances.image_path',
            'home_appliances.product_city',
            'products.product_type'
        )
        ->join('products', 'home_appliances.product_id', '=', 'products.id')
        ->orderBy('home_appliances.created_at', 'desc')
        ->take(3)
        ->get();
    }

    // دالة لجلب جميع المنتجات
    public function getAll(): \Illuminate\Support\Collection
    {
        return HomeAppliance::select(
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
    }
}
