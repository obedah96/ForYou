<?php

namespace App\Application\UseCases\HomeAppliances;
//App\Application\UseCases\HomeAppliances\GetHomeAppliancesUseCase.php
use App\Infrastructure\Repositories\Interfaces\HomeApplianceRepositoryInterface;

class GetHomeAppliancesUseCase
{
    protected $repository;

    public function __construct(HomeApplianceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute( int $page)
    {
        return $this->repository->paginate( $page);
    }
}
