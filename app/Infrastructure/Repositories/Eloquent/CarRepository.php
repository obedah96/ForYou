<?php

namespace App\Infrastructure\Repositories\Eloquent;
//app\Infrastructure\Repositories\Eloquent\CarRepository.php
use App\Domain\Entities\Car;
use App\Infrastructure\Repositories\Interfaces\CarRepositoryInterface;

class CarRepository implements CarRepositoryInterface
{
    public function getLatestCars(int $perPage)
    {
        return Car::orderBy('created_at', 'desc')->paginate($perPage);
    }
}
