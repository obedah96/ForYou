<?php
// App\Application\UseCases\ElectricalAppliances\GetPaginatedElectricalAppliances.php
namespace App\Application\UseCases\ElectricalAppliances;

use App\Infrastructure\Repositories\Interfaces\ElectricalApplianceRepositoryInterface;

class GetPaginatedElectricalAppliances
{
    protected $repository;

    public function __construct(ElectricalApplianceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    
    public function getLatestThree()
    {
        return $this->repository->getLatestThreeAppliances();
    }

    
    public function getAll()
    {
        return $this->repository->getAllAppliances();
    }
}
