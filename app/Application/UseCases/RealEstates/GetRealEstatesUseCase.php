<?php
//  App\Application\UseCases\RealEstates\GetRealEstatesUseCase.php
namespace App\Application\UseCases\RealEstates;

use App\Infrastructure\Repositories\Interfaces\RealEstateRepositoryInterface;

class GetRealEstatesUseCase
{
    protected $realEstateRepository;

    public function __construct(RealEstateRepositoryInterface $realEstateRepository)
    {
        $this->realEstateRepository = $realEstateRepository;
    }

    public function execute(int $perPage)
    {
        return $this->realEstateRepository->paginateRealEstates($perPage);
    }
}
