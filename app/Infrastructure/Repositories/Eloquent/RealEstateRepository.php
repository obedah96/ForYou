<?php
//App\Infrastructure\Repositories\Eloquent\RealEstateRepository.php
namespace App\Infrastructure\Repositories\Eloquent;
use App\Infrastructure\Repositories\Interfaces\RealEstateRepositoryInterface;
use App\Domain\Entities\RealEstate;

class RealEstateRepository implements RealEstateRepositoryInterface
{
    public function paginateRealEstates(int $perPage): \Illuminate\Contracts\Pagination\Paginator
    {
        return RealEstate::orderBy('created_at', 'desc')->paginate($perPage);
    }
}
