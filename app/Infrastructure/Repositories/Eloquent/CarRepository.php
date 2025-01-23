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


    }
*/
        public function getLatestCars(int $perPage)
        {
            if ($perPage === 1) {
                
                return Car::select('cars.product_id', 'cars.product_name', 'cars.price', 'cars.image_path', 'cars.product_city', 'products.product_type')
                    ->join('products', 'cars.product_id', '=', 'products.id')
                    ->orderBy('cars.created_at', 'desc')
                    ->limit(3) 
                    ->get();
            } 
            elseif ($perPage === 2) {
                
                return Car::select('cars.product_id', 'cars.product_name', 'cars.price', 'cars.image_path', 'cars.product_city', 'products.product_type')
                    ->join('products', 'cars.product_id', '=', 'products.id')
                    ->orderBy('cars.created_at', 'desc')
                    ->skip(3) 
                    ->take(PHP_INT_MAX)
                    ->get();
            } 
            else {
                return collect([]);
            }
        }

}
