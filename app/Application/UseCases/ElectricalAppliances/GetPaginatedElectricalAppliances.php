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

    public function execute(int $itemsPerPage)
    {
        return $this->repository->paginateElectricalAppliances($itemsPerPage);
    }
}
