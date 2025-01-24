<?php

namespace App\Application\UseCases\HomeAppliances;

use App\Infrastructure\Repositories\Interfaces\HomeApplianceRepositoryInterface;

class GetHomeAppliancesUseCase
{
    protected $repository;

    public function __construct(HomeApplianceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    
    public function getLatestThree()
    {
        return $this->repository->getLatestThree();
    }

    
    public function getAll()
    {
        return $this->repository->getAll();
    }
}
