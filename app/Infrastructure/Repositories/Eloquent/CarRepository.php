<?php

namespace App\Infrastructure\Repositories\Eloquent;
//app\Infrastructure\Repositories\Eloquent\CarRepository.php
use App\Domain\Entities\Car;
use App\Infrastructure\Repositories\Interfaces\CarRepositoryInterface;

class CarRepository implements CarRepositoryInterface
{
   /* public function getLatestCars(int $perPage)
    {
        return Car::select('cars.product_id', 'cars.product_name', 'cars.price', 'cars.image_path', 'cars.product_city', 'products.product_type')
        ->join('products', 'cars.product_id', '=', 'products.id') 
        ->orderBy('cars.created_at', 'desc')
        ->paginate($perPage);


    }*/

    public function getLatestCars(int $perPage)
    {
       
        $allCars = Car::select('cars.product_id', 'cars.product_name', 'cars.price', 'cars.image_path', 'cars.product_city', 'products.product_type')
            ->join('products', 'cars.product_id', '=', 'products.id')
            ->orderBy('cars.created_at', 'desc')
            ->get();
    
        
        $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();
    
        if ($currentPage == 1) {
            
            $items = $allCars->take(3);
        } else {
            
            $items = $allCars->skip(3);
        }
    
        return new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $allCars->count(),
            $perPage,
            $currentPage,
            ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
        );
    }
    

}
