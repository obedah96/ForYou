<?php

namespace App\Application\UseCases\Cars;
//app\Application\UseCases\Cars\GetLatestCarsUseCase.php
use App\Infrastructure\Repositories\Interfaces\CarRepositoryInterface;

class GetLatestCarsUseCase
{
    protected $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function execute(int $perPage)
    {
        return $this->carRepository->getLatestCars($perPage);
    }
}
